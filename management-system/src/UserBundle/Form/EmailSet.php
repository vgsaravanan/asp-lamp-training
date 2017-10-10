<?php
namespace UserBundle\Form;

use UserBundle\Entity\UserEmail;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

/**
* class EmailSet to create Email Fields 
*
*/

class EmailSet extends AbstractType
{

    /**
    * Function to build form with EmailType
    * 
    * @param object $builder
    *
    * @param array $options
    *
    */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   
        $builder
            ->add('emailId', EmailType::class , array(
                'label' => false,
                'attr' => array("class" => 'email-box') ))
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => UserEmail::class,
        ));
    }
}


