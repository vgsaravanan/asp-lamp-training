<?php

namespace UserBundle\Controller;

use UserBundle\Entity\UserDetail;
// use UserBundle\Entity\BloodGroup;
// use UserBundle\Entity\Gender;
use UserBundle\Entity\UserEmail;
use UserBundle\Entity\UserContact;
use UserBundle\Entity\UserGraduation;
use UserBundle\Entity\InterestType;


use UserBundle\Form\NewUser;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class UserController extends Controller
{

     

    public function newAction(Request $request)
    {
    	$newUser = new UserDetail();
        $newUser->addEmailId(new UserEmail());

        $newUser->addContactNumber(new UserContact());
        $newUser->addInterest(new InterestType());
        $newUser->addGraduationType(new UserGraduation());
        // $blood = new BloodGroup();
        // $gender = new Gender();
        // $graduation = new Graduation();
        // $newUser->setBloodGroup($blood);
        // $newUser->setGender($gender);

    	// $newUser->setEmail(array(''));
    	// $newUser->setMobileNumber(array(''));


    	$form = $this->createForm(NewUser::class,$newUser);
    	
    	$form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // dump($form->isValid()); die();
            $task = $form->getData();

            
            $em = $this->getDoctrine()->getManager();
            $em->persist($newUser);
            // dump($newUser); die();
            $em->flush();
            // dump($newUser); die();
            return new Response($newUser->getId());
        }

        
        return $this->render('UserBundle:Default:new.html.twig',array('form' => $form->createView(),
        	));
    }

    public function listAction(Request $request)
    {
        // $listUser = new User();
        $page = $request->get('page');
        dump($page);
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository("UserBundle:UserDetail");
        $user = $repository->findAll();
        $limit = 5;
        $offset = ($page-1)*$limit;
        dump($offset);
        $userlist = $repository->findBy(array(),array(), $limit, $offset);
        $total_page = ceil(count($user)/$limit);
        // $url = $this->generateUrl('list_user', array('page' => $page ), UrlGeneratorInterface::ABSOLUTE_URL);
        // dump($url); die();
        // $list = $repository->getAllPosts($page);
        // dump($list); die();

       /* $returnedItem = $list->getIterator()->count();
        dump($returnedItem); 
        $totalItem = $list->count();
        dump($totalItem); 
        $iterator = $list->getIterator();
        dump($iterator); */
        
        // $max = ceil($list->count() / $limit);
        // dump($max); die();
        $thisPage = $page;


        // $user = $repository->findAll();
      /*          ->setFirstResult(0)
                ->setMaxResults(100);
        $paginator = new Paginator($user, $fetchJoinCOllection = true);

        *//*$c = count($paginator);
        foreach ($paginator as $post) {
            echo $post->getHeadline() . "\n";
        }*/
        /*foreach ($user as $listUser) {
           echo $listUser->getId();
           echo $listUser->getFirstName();
        }*/

        // return $this->render('UserBundle:Default:listuser.html.twig', array('results' => $user));

        return $this->render('UserBundle:Default:listuser.html.twig', array('results' => $userlist,'max' => $total_page, "current" => $page));
    }

    public function viewAction(Request $request)
    {
        // $user_id = $_GET['idUserDetail
            // $listUser = new UserDetail();
        $id = $request->get('id');
        $repository = $this->getDoctrine()->getRepository(UserDetail::class);
        $user = $repository->find($id);
      /*          ->setFirstResult(0)
                ->setMaxResults(100);
        $paginator = new Paginator($user, $fetchJoinCOllection = true);

        *//*$c = count($paginator);
        foreach ($paginator as $post) {
            echo $post->getHeadline() . "\n";
        }*/
        /*foreach ($user as $listUser) {
           echo $listUser->getId();
           echo $listUser->getFirstName();
        }*/

        return $this->render('UserBundle:Default:viewuser.html.twig', array('results' => $user));
    }

    public function editAction(Request $request)
    {
        $id = $request->get('id');
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository("UserBundle:UserDetail");
        $fetch = $repository->find($id);

        if (!$fetch) {
            throw $this->createNotFoundException("Unable to fetch Details");
        }
        $form = $this->createForm(NewUser::class, $fetch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $repository = $entityManager->getRepository("UserBundle:UserDetail");
            $fetch = $form->getData();
            // $entityManager->persist($fetch);
            // dump($fetch); die();
            $entityManager->flush();
            return new Response($fetch->getFirstName());
        }

        return $this->render("UserBundle:Default:new.html.twig", array('form'=> $form->createView(),
            ));

    }
    
}
