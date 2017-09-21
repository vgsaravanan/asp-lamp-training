<?php

namespace UserBundle\Controller;

use UserBundle\Entity\UserInfo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class UserController extends Controller
{
    public function newAction(Request $request)
    {
    	$newUser = new UserInfo();
    	// $newUser->setEmail(array('dd@gmail.com','dsssd@gmail.com','ssdd@gmail.com'));

    	$form = $this->createFormBuilder($newUser)
    	->add('first_name', TextType::class)
    	->add('last_name', TextType::class)
    	->add('date_of_birth', DateType::class,array(
    		'widget' => 'single_text',
    		))

        ->add('bloodgroup', ChoiceType::class,array(
        	'choices'  => array(
		       	'O+' => True,
		        'A+' => True,
		        'B+' => True,
		        'AB+' => True,
		        'AB-' => True,
		        'B-' => True,
		        'A-' => True,
		        'O-' => True,
		        'No' => True,
        		 ),
        	'required' => True))
        ->add('gender',ChoiceType::class,array(
        	'choices' => array(
        		'Male' => 'Male' ,
        		'Female' => "Female"
        		 ),
        	'multiple' => false,
	        'expanded' => true,
	        // 'required' => true,
	        'data'     => 'Male'
        	))

    	->add('email_id', CollectionType::class, array(
    		'entry_type' => EmailType::class,
    		'allow_add' => true,
			'allow_delete' => true,
			'prototype' => true,
    		'entry_options' => array(
    			'attr' => array('class' => 'email-box'),
    			'required' => false
    			),
    		))
    	->add('mobile_no', CollectionType::class, array(
    		'entry_type' => TextType::class,
    		'allow_add' => true,
			'allow_delete' => true,
			'prototype' => true,
    		'entry_options' => array(
    			'attr' => array('class' => 'mobile-no-box'),
    			'required' => false
    			),
    		))
    	->getForm();

    	$form->handleRequest($request);

        
        return $this->render('UserBundle:Default:new.html.twig',array('form' => $form->createView(),
        	));
    }
}
