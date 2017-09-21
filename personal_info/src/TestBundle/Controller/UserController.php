<?php

namespace TestBundle\Controller;


use TestBundle\Entity\UserInfo;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserController extends Controller
{

    public function userAction(Request $request)
    {
        $track = new UserInfo();
        // $track->setfirstName('Saravanan');
        // $track->setlastName('Venugopal');
        // $track->setdateofbirth(new \DateTime("1995/05/25"));
        // $track->setBloodGroup('A1+');

        $form = $this->createFormBuilder($track)
        ->add('first_name', TextType::class, array('required' => false))
        ->add('last_name', TextType::class,array('required' => false))
        ->add('dateofbirth', DateType::class, array(
            'widget'=>'single_text',
            'format' => 'yyyy-MM-dd',
            'required' => false,
            ))
        ->add('bloodgroup', TextType::class,array('required' => false))
        ->add('Save', SubmitType::class, array('label' => 'Submit'))
        // ->add('Add', SubmitType::class, array('label' => 'Add'))
        ->getForm();
        $form->handleRequest($request);

        // $validator = $this->get('validator');
        // $errors = $validator->validate($track);

        // if (count($errors) > 0) {
        //     $errorsString = (string) $errors;
        //     return new  Response($errorsString);
        // }

        

        if ($form->isSubmitted() && $form->isValid()) {
            $track = $form->getData();
            return $this->redirectToRoute("success");
        }
        
        return $this->render('TestBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
            ));
    }

    public function successAction()
    {
       return $this->render('TestBundle:Default:success.html.twig', array(
            'form' => $form->createView(),
            ));
    }

}
