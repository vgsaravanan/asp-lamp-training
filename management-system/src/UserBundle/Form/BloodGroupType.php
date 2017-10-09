<?php
namespace UserBundle\Form;

use UserBundle\Entity\BloodGroup;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class bloodGroupType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder       
            ->add('bloodGroupType', EntityType::class, array(
                'class' => 'UserBundle:BloodGroup',
                'choice_label' => 'bloodGroupType',
                )
            )
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => BloodGroup::class,
        ));
    }
}

