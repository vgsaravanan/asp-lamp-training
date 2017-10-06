<?php

namespace UserBundle\Controller;

use UserBundle\Entity\UserDetail;
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

    	$form = $this->createForm(NewUser::class,$newUser);
    	
    	$form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();            
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

    public function listAction(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository("UserBundle:UserDetail");
        $user = $repository->findAll();
        $limit = 5;
        $offset = 0;
        $userlist = $repository->findBy(array(),array(), $limit, $offset);
        $total_page = ceil(count($user)/$limit);
        return $this->render('UserBundle:Default:listuser.html.twig', array('max' => $total_page,"results"=>$userlist, "current" => 1));
    }

    public function displayAction(Request $request)
    {
        $page = $request->get('page');
        dump($page);
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository("UserBundle:UserDetail");
        $limit = 5;
        $offset = ($page-1)*$limit;
        dump($offset);
        $userlist = $repository->findBy(array(),array(), $limit, $offset);

        return $this->render('UserBundle:Default:displayType.html.twig', array('results' => $userlist, "current"=> $page));
    }

    public function viewAction(Request $request)
    {

        $id = $request->get('id');
        $repository = $this->getDoctrine()->getRepository(UserDetail::class);
        $user = $repository->find($id);
        if (!$user) {
            throw $this->createNotFoundException('No Details found for');
        }
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
            $entityManager->flush();
            return new Response($fetch->getFirstName());
        }
        return $this->render("UserBundle:Default:new.html.twig", array('form'=> $form->createView(),
            ));
    }   
}
