<?php
namespace UserBundle\Form;

use UserBundle\Entity\GraduationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
* class UserGraduationType to create Graduation Fields 
*
*/

class UserGraduationType extends AbstractType
{
    /**
    * Function to build form with TextType
    * 
    * @param object $builder
    *
    * @param array $options
    *
    */

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', TextType::class, array(
                'label' => false,
                'required' => false,
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'ADD',
            ));
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => GraduationType::class,
        ));
    }
}