<?php
namespace UserBundle\Form;

use UserBundle\Entity\AreaOfInterest;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class InterestTypeSet extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {	
        $interest = new AreaOfInterest();
        
        $builder
            ->add('interest',EntityType::class,array(
                'class' => "UserBundle:AreaOfInterest",
                'choice_label' => "interest",
                'multiple' => false,
                'expanded' => true,
                'required' => false,
                ))
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => AreaOfInterest::class,
        ));
    }
}


