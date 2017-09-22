<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\HttpFoundation\Response;

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


    public function createAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $user->setfirstName('saravanan');
        $user->setlastName('venugopal');
        $user->setdateofbirth(new \DateTime('25-05-1995'));
        $user->setBloodGroup(4);
        $user->setGender(1);
        $user->setEmail(3);
        $user->setContactNumber(2);
        $user->setInterest(4);
        $user->setGraduation(2);


        $em->persist($user);
        $em->flush();

        return new Response("saved new user with id". $user->getUserId());
    }

    public function showAction()
    {
        $userId = 1;
        $repository = $this->getDoctrine()->getRepository(User::class);
        $user = $repository->findAll();

        if(!$user) {
            throw $this->createNotFoundException('User Not found for id'.$userId);
        }
        //echo $user['first_name'];
       echo $user[0].first_name;

        return new Response("saved new user with id");
    }
}
