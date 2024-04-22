<?php

namespace App\Form;

use App\Entity\Entreprise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // nous venons préciser le type d'input ex: text = TextType, importer la class par la suite
            ->add('raisonSociale', TextType::class, [
                'attr' => [
                    'class' => 'form-control' //l'ajout d'une classe se fait ici pour le formulaire
                    ]
            ])
            ->add('dateCreation', DateType::class, [
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control' //l'ajout d'une classe se fait ici pour le formulaire
                    ]
            ])
            ->add('adresse', TextType::class, [
                'attr' => [
                    'class' => 'form-control' //l'ajout d'une classe se fait ici pour le formulaire
                    ]
            ])
            ->add('cp',  TextType::class, [
                'attr' => [
                    'class' => 'form-control' //l'ajout d'une classe se fait ici pour le formulaire
                    ]
            ])
            ->add('ville',  TextType::class, [
                'attr' => [
                    'class' => 'form-control' //l'ajout d'une classe se fait ici pour le formulaire
                    ]
            ])
            ->add('Valider', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-success'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
        ]);
    }
}
