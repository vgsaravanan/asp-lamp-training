<?php
namespace UserBundle\Form;

use UserBundle\Entity\UserEmail;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;


class EmailSet extends AbstractType
{
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


