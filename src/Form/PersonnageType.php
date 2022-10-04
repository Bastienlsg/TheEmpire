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
            ->add('DateDeNaissance', null, ['years' => range(date('Y'), date('Y') - 250)])
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
}
