<?php

namespace App\Form;

use App\Entity\Offre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type')
            ->add('titre')
            ->add('adresse')
            ->add('date_exp')
            ->add('annee_exp')
            ->add('diplome')
            ->add('nbr_post')
            ->add('act_principal')
            ->add('description')
            ->add('comp_req')
            ->add('offre')
            ->add('categories')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offre::class,
        ]);
    }
}
