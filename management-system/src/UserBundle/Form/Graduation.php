<?php
namespace UserBundle\Form;

use UserBundle\Entity\GraduationType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class Graduation extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {	
        $builder
        	->add('type',EntityType::class,array(
				'class' => "UserBundle:GraduationType",
				'choice_label' => "type",
				'multiple' => false,
			    'expanded' => true,
			    'required' => false,
				))
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => GraduationType::class,
        ));
    }
}


