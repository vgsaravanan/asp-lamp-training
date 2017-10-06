<?php
namespace UserBundle\Form;

use UserBundle\Entity\InterestType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class InterestTypeSet extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {	
        
        $builder
            ->add('interest',EntityType::class,array(
                'class' => "UserBundle:AreaOfInterest",
                'choice_label' => "interest",
                'label' => false,
                'required'=> false,
                'attr'=> array("class"=>"interest-type")
                ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => InterestType::class,
        ));
    }
}


