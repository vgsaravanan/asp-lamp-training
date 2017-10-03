<?php
namespace UserBundle\Form;

use UserBundle\Entity\UserDetail;
// use UserBundle\Entity\BloodGroup;
// use UserBundle\Entity\Gender;
// use UserBundle\Form\EmailSet;
// use UserBundle\Form\MobileNumberSet;
// use UserBundle\Form\InterestTypeSet;

// use UserBundle\Form\BloodGroupType;
// use UserBundle\Form\GenderType;

// use UserBundle\Form\Graduation;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class NewUser extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {	
        $builder
            ->add('first_name', TextType::class,array('required' => false))
			->add('last_name', TextType::class,array('required' => false))
			->add('date_of_birth', DateType::class,array(
				'widget' => "single_text",
			/*	'placeholder' => array( 'year' => 'Year', 'month' => 'Month', 'day' => 'Day'),
			*/	'attr'=> ['class' => 'js-datepicker'],

				'html5' => false,
				'required' => false
				))
			/*->add('blood_group_id', EntityType::class, array(
				'class' => 'UserBundle:BloodGroup',
				'choice_label' => 'bloodGroup',
				// 'expanded' => false,
				// 'multiple' => false,
				// 'required' => false 
				)
			)*/

			->add('gender',EntityType::class,array(
				'class' => "UserBundle:Gender",
				'choice_label' => "gender",
				'multiple' => false,
			    'expanded' => true,		
			    	   
				))

			->add('bloodGroup', EntityType::class, array(
				'class' => 'UserBundle:BloodGroup',
				'choice_label' => 'bloodGroupType',
				// 'expanded' => false,
				// 'multiple' => false,
				// 'required' => false 
				)
			)
			// ->add('bloodGroup', BloodGroupType::class)
			// ->add('gender', GenderType::class)
			// ->add('graduation', Graduation::class);

			->add('emailId', CollectionType::class, array(
				'entry_type' => EmailSet::class,
				'allow_add' => true,
				'allow_delete' => true,
				'by_reference' => false,
				'prototype' => true,
				'required' => false,

				'entry_options' => array(
					'attr' => array('class' => 'email-box'),
					// 'required' => false,
					'trim' => true
					),
				))

			->add('contactNumber', CollectionType::class, array(
				'entry_type' => MobileNumberSet::class,
				'allow_add' => true,
				'allow_delete' => true,
				'prototype' => true,
				'by_reference' => false,
				'required' => false,

				// 'entry_options' => array(
				// 	'attr' => array('class' => 'mobile-no-box'),
				// 	'by_reference' => false,
				// 	'required' => false,
				// 	'trim' => true
				// 	),
				))

			->add('interest',CollectionType::class, array(
				'entry_type' => InterestTypeSet::class,
				'allow_add' => true,
				'allow_delete' => true,
				'prototype' => true,
				'by_reference' => false,

				'entry_options' => array(
					'attr' => array('class' => 'interest-box'),
					'required' => false,
				/*	'by_reference' => false,
					'trim' => true*/
					// 'empty_data' => "new $data_class()",

					// 'data' => 'adaa'
					)
				))

			->add('graduationType',CollectionType::class, array(
				'entry_type' => Graduation::class,
				'allow_add' => true,
				'allow_delete' => true,
				'by_reference' => false,
				'prototype' => true,
				'entry_options' => array(
					'attr' => array('class' => 'graduation-box'),
					'required' => false,
				/*	'by_reference' => false,
					'trim' => true*/
					// 'empty_data' => "new $data_class()",

					// 'data' => 'adaa'
					)
				))
			

			/*->add('gender',ChoiceType::class,array(
				'choices' => array(
					'Male' => 'Male' ,
					'Female' => "Female"
					 ),
				'multiple' => false,
			    'expanded' => true,
			    'required' => false,
				))*/

			/*
			
			
			->add('graduation',ChoiceType::class, array(
				'choices' => array(
					'UG' => 'UG' ,
					'PG' => "PG",
					'Masters' => 'Masters' ,
					'SSLC' => 'SSLC' ,
					'HSC' => 'HSC' ,
					'Diplamo' => 'Diplamo',
					 ),
				'multiple' => false,
			    'expanded' => false,
			    'required' => false,
				))*/
				->add('Save', SubmitType::class, array('label' => 'Submit'))
		;	
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => UserDetail::class,
        ));
    }
}