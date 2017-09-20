<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Track;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    public function newAction(Request $request)
    {
        $track = new Track();
        $track->setfirstName('Saravanan');
        $track->setlastName('Venugopal');
        $track->setdateofbirth(new \DateTime("1995/05/25"));
        $track->setBloodGroup('A1+');

        $form = $this->createFormBuilder($track)
        ->add('first_name', TextType::class)
        ->add('last_name', TextType::class)
        ->add('dateofbirth', DateType::class)
        ->add('bloodgroup', TextType::class)
        ->add('save', SubmitType::class, array('label' => 'Submit'))
        ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $track = $form->getData();
            echo "success";
            //return $this->redirectToRoute("track");
        }
        
        return $this->render('default/new.html.twig', array(
            'form' => $form->createView(),
            ));
    }
}
