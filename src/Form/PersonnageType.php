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
            ->add('Nom', null, ['attr' => array('class' => 'w-100pc mg-5px')])
            ->add('DateDeNaissance', null, ['years' => range(date('Y'), date('Y') - 250)])
            ->add('Description', null, ['attr' => array('class' => 'w-100pc mg-5px')])
            ->add('Niveau', null, ['attr' => array('class' => 'w-100pc mg-5px')])
            ->add('Experience', null, ['attr' => array('class' => 'w-100pc mg-5px')])
            ->add('Vie', null, ['attr' => array('class' => 'w-100pc mg-5px')])
            ->add('PersonnageCompetence', null, ['attr' => array('class' => 'w-100pc mg-5px')])
            ->add('PersonnageType', null, ['attr' => array('class' => 'w-100pc mg-5px')])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personnage::class,
        ]);
    }
}
