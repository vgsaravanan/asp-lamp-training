<?php

namespace UserBundle\Controller;

use UserBundle\Entity\UserDetail;
// use UserBundle\Entity\BloodGroup;
// use UserBundle\Entity\Gender;
use UserBundle\Entity\UserEmail;
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



class UserController extends Controller
{

     

    public function newAction(Request $request)
    {
    	$newUser = new UserDetail();
        $newUser->addEmailId(new UserEmail());
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
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $em = $this->getDoctrine()->getManager();
            $em->persist($newUser);
            // dump($newUser); die();
            $em->flush();
            dump($newUser); die();
            return new Response($newUser->getId());
        }

        
        return $this->render('UserBundle:Default:new.html.twig',array('form' => $form->createView(),
        	));
    }

    public function listAction(Request $request)
    {
            // $listUser = new User();
        $repository = $this->getDoctrine()->getRepository(UserDetail::class);
        $user = $repository->findAll();
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

        return $this->render('UserBundle:Default:listuser.html.twig', array('results' => $user));
    }

    public function viewAction($id, Request $request)
    {
        // $user_id = $_GET['idUserDetail
            // $listUser = new UserDetail();
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

        return $this->render('UserBundle:Default:listuser.html.twig', array('results' => $user));
    }

    public function editAction($id, Request $request)
    {
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
