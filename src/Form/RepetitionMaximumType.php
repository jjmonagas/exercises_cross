<?php

namespace App\Form;

use App\Entity\RepetitionMaximum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RepetitionMaximumType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('weight')
            ->add('reps')
            ->add('rmDate')
            ->add('rmTime')
            ->add('exercise')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RepetitionMaximum::class,
        ]);
    }
}
