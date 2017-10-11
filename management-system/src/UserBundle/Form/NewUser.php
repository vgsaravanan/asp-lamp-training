<?php
namespace UserBundle\Form;

use UserBundle\Entity\UserDetail;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\ChoiceList\Loader\CallbackChoiceLoader;

/**
* class NewUser to create UserDetails 
*
*/

class NewUser extends AbstractType
{

    /**
    * Function to build a complete form
    * 
    * @param object $builder
    *
    * @param array $options
    *
    */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   
        $builder
            ->add('firstName', TextType::class,array(
                'required' => false,
                ))
            ->add('lastName', TextType::class,array('required' => false))
            ->add('dateOfBirth', DateType::class,array(
                'widget' => "single_text",
                'attr'=> ['class' => 'js-datepicker'],
                'html5' => false,
                'required' => false
                ))

            ->add('gender',EntityType::class,array(
                'class' => "UserBundle:Gender",
                'choice_label' => "gender",
                'multiple' => false,
                'expanded' => true,             
                // 'required'=>false,
                'attr'=>array("class"=>"gender-type")     
                ))

            ->add('bloodGroup', EntityType::class, array(
                'class' => 'UserBundle:BloodGroup',
                'choice_label' => 'bloodGroupType',             
                'required' => false,
                )
            )

            ->add('emailId', CollectionType::class, array(
                'entry_type' => EmailSet::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'prototype' => true,
                'required' => false,
                'entry_options' => array(
                    'attr' => array(
                        'class' => 'email-box'
                        )
                    ),
                ))

            ->add('contactNumber', CollectionType::class, array(
                'entry_type' => MobileNumberSet::class,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false,
                'required' => false,
                'entry_options' => array(
                    'attr' => array('class' => 'mobile-no-box'),
                    ),
                ))

            ->add('interest',CollectionType::class, array(
                'entry_type' => InterestTypeSet::class,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false,
                'entry_options' => array(
                    'attr' => array('class' => 'interest-box'),
                    )
                ))

            ->add('graduationType',CollectionType::class, array(
                'entry_type' => Graduation::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'prototype' => true,
                'required'=> false,
                'entry_options' => array(
                    'attr' => array('class' => 'graduation-box'),
                    'required' => false,
                    )
                ))
                ->add('save', SubmitType::class,array('label'=>'submit'))
                ->add('image', FileType::class, array(
                    'data_class' => null,
                    'label'=> "Profile Pic",
                    'property_path' => 'image',
                    "required"=> false
                    ))
        ;   
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => UserDetail::class,
        ));
    }
}