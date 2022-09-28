<?php

namespace App\Form;

use App\Entity\Type;
use App\Entity\Personnage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonnageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom')
            ->add('DateDeNaissance')
            ->add('Description')
            ->add('Niveau')
            ->add('Experience')
            ->add('Vie')
            ->add('PersonnageCompetence')
            ->add('PersonnageType')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personnage::class,
        ]);
    }

    public function buildFormType(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom')
            ->add('Avatar')
        ;
    }

    public function configureOptionsType(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Type::class,
        ]);
    }
}
