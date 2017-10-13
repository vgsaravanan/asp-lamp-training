<?php

namespace UserBundle\Controller;

use UserBundle\Entity\UserDetail;
use UserBundle\Entity\UserEmail;
use UserBundle\Entity\UserContact;
use UserBundle\Entity\UserGraduation;
use UserBundle\Entity\InterestType;
use UserBundle\Entity\AreaOfInterest;
use UserBundle\Entity\GraduationType;
use UserBundle\Form\UserType;
use UserBundle\Form\UserInterestType;
use UserBundle\Form\UserGraduationType;
// use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
/*use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;*/
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\File\File;

/**
* class UserController to control Action 
*
*/

class UserController extends Controller
{
    private $limit;
    private $offset;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->limit = 0;
        $this->offset = 0;
    }
    
    /**
    * Function to add new user 
    * 
    * @param object $request
    *
    * @return {array} 
    */
    
    public function newAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }
        $session = $request->getSession();
        $newUser = new UserDetail();
        $newUser->addEmailId(new UserEmail());
        $newUser->addContactNumber(new UserContact());
        $newUser->addInterest(new InterestType());
        $newUser->addGraduationType(new UserGraduation());

        $form = $this->createForm(UserType::class,$newUser);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newUser = $form->getData();     
            $file = $newUser->getImage();

            
            $fileName = md5(uniqid(mt_rand(), true));
            $fileName = $fileName.".".$file->guessExtension();
            $file->move(
                $this->getParameter('brochures_directory'), 
                $fileName
                );
            $newUser->setImage($fileName);  

            /*$newUser->setImage(
                new File($this->getParameter("brochures_directory").$newUser->getImage())
            ); */

            $em = $this->getDoctrine()->getManager();
            $em->persist($newUser);
            $em->flush();
            $this->addFlash(
                'success',
                'New User Added Successfully!'
                );
            return $this->redirectToRoute('new_user');
        }
        return $this->render('UserBundle:Default:new.html.twig',array('form' => $form->createView(),
            ));
    }

    /**
    * Function to list all user
    * 
    * @param object $request
    *
    * @return {array} 
    */
    public function listAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository("UserBundle:UserDetail");
        $user = $repository->findAll();
        $this->limit = $this->container->getParameter('limit');
        $userlist = $repository->findBy(
            array(),
            array(),
            $this->limit,
            $this->offset
            );
        $total_page = ceil(count($user)/$this->limit);
        return $this->render('UserBundle:Default:listuser.html.twig', array('max' => $total_page,
            "results"=>$userlist, 
            "current" => 1
            ));
    }

    /**
    * Function to display users
    * 
    * @param object $request
    *
    * @return {array} 
    */
    public function displayAction(Request $request)
    {
        $page = $request->get('page');
        dump($page);
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository("UserBundle:UserDetail");
        $this->limit = $this->container->getParameter('limit');
        $this->offset = ($page-1)*$this->limit;
        $userlist = $repository->findBy(array(),array(), $this->limit, $this->offset);

        return $this->render('UserBundle:Default:displayType.html.twig', array('results' => $userlist, "current"=> $page));
    }

    /**
    * Function to view user details
    * 
    * @param object $request
    *
    * @return {array} 
    */
    public function viewAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }
        $id = $request->get('id');
        $repository = $this->getDoctrine()->getRepository(UserDetail::class);
        $user = $repository->find($id);
        if (!$user) {
            throw $this->createNotFoundException('No Details found for');
        }
        return $this->render('UserBundle:Default:viewuser.html.twig', array('results' => $user));
    }

    /**
    * Function to Manipulate User Details
    * 
    * @param object $request
    *
    * @return {array} 
    */
    public function editAction(Request $request)
    {
        $id = $request->get('id');
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository("UserBundle:UserDetail");
        $user = $repository->find($id);

        if (!$user) {
            throw $this->createNotFoundException("Unable to fetch Details");
        }
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $repository = $entityManager->getRepository("UserBundle:UserDetail");
            $user = new UserDetail();
            $user = $form->getData();
            $file = $user->getImage();
         /*   $file = $user->getImage();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('brochures_directory'),
                $fileName
                );*/
            // $user->setImage($fileName);   
           /* $file = $user->getImage();
            dump($file);
            die();    */
            /*$user->setImage(
                new File($this->getParameter("brochures_directory").'/'.$user->getImage())
            );*/

            $fileName = md5(uniqid(mt_rand(), true));
            $fileName = $fileName.".".$file->guessExtension();
            $file->move(
                $this->getParameter('brochures_directory'), 
                $fileName
                );
            $user->setImage($fileName);  
            $entityManager->flush();
            $this->addFlash(
                'success',
                'Changes Applied Successfully!'
                );
            return $this->redirectToRoute('view_user');
        }
        return $this->render("UserBundle:Default:new.html.twig", array(
            'form'=> $form->createView(),
            ));
    }   
}
