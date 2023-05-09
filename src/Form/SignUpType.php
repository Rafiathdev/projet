<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Doctrine\DBAL\Types\StringType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SignUpType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_c')
            ->add('prenom_c')
            ->add('sexe',ChoiceType::class,[
                "choices"=>[
                    "Masculin"=>"M",
                    "Feminin"=>"F"
                ]
            ])
            ->add('email',EmailType::class)
            ->add('date_n',DateType::class)
            ->add('nationnalite')
            ->add('niveau', ChoiceType::class,[
                "choices"=>[
                    "CEP"=>"CEP",
                    "BEPC"=>"BEPC",
                    "BAC"=>"BAC",
                    "LICENCE"=>"LICENCE",
                    "MASTER +"=>"MASTER +",
                    ]
            ])
            ->add('adresse')
            ->add('qualification',TextType::class)
            ->add('telephone', telType::class)
            ->add('password', PasswordType::class)
            ->add('pdf_cv', FileType::class)
            ->add('photo', FileType::class)
            ->add('entreprise', TextType::class)
            ->add('ifu', TextType::class)
            ->add('rccm', TextType::class)
            ->add('site_web', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
