<?php
namespace UserBundle\Form;

use UserBundle\Entity\UserContact;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

/**
* class MobileNumberSet to create COntactNumber Fields 
*
*/

class MobileNumberSet extends AbstractType
{
    /**
    * Function to build form with NumberType
    * 
    * @param object $builder
    *
    * @param array $options
    *
    */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   
        $builder
            ->add('contactNumber', NumberType::class, array(
                'label' => false,
                'attr' => array("class" => 'mobile-no-box')
                 ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => UserContact::class,
        ));
    }
}


