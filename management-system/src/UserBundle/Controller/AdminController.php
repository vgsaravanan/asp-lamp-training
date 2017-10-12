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

/**
* class AdminController to control admin Action 
*
*/

class AdminController extends Controller
{
    
    /**
    * Function to perform Admin action 
    * 
    * @param object $request
    *
    * @return {array} 
    */
     public function adminAction(Request $request)
    {
        $user = new UserDetail();
        $user->addInterest(new InterestType());
        $user->addGraduationType(new UserGraduation());
        
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        return $this->render('UserBundle:Default:admin.html.twig', array(
            'form' => $form->createView(),
        ));
    }
        
    /**
    * Function to Manipulate InterestType
    * 
    * @param object $request
    *
    * @return {array} 
    */
    public function addInterestAction(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository('UserBundle:AreaOfInterest');
        $interests = $repository->findAll();
        
        $interest = new AreaOfInterest();
        $form = $this->createForm(UserInterestType::class, $interest);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $interest = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($interest);
            $entityManager->flush();
            $this->addFlash(
                'success',
                'Changes Applied Successfully!'
                );
            return $this->redirectToRoute('admin');
        }
        return $this->render('UserBundle:Default:addInterest.html.twig', array(
            'interests' => $interests,
            'form' => $form->createView(),
        ));
        
    }
    
    /**
    * Function to Manipulate GraduationType
    * 
    * @param object $request
    *
    * @return {array} 
    */
    public function addGraduationAction(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository('UserBundle:GraduationType');
        $graduationType = $repository->findAll();
        
        $education = new GraduationType();
        $form = $this->createForm(UserGraduationType::class, $education);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $education = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($education);
            $entityManager->flush();
            $this->addFlash(
                'success',
                'Changes Applied Successfully!'
                );
            return $this->redirectToRoute('admin');
        }
        return $this->render('UserBundle:Default:addGraduation.html.twig', array(
            'graduationType' => $graduationType,
            'form' => $form->createView(),
        ));   
    }
}
