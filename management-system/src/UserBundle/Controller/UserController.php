<?php

namespace UserBundle\Controller;

use UserBundle\Entity\User;
// use UserBundle\Entity\BloodGroup;
// use UserBundle\Entity\Gender;
// use UserBundle\Entity\UserEmail;
use UserBundle\Form\NewUser;
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
    	$newUser = new User();
        // $blood = new BloodGroup();
        // $gender = new Gender();
    //    $graduation = new Graduation();
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
            $em->flush();
            return new Response($newUser->getId());
        }

        
        return $this->render('UserBundle:Default:new.html.twig',array('form' => $form->createView(),
        	));
    }
}
