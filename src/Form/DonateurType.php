<?php

namespace App\Form;

use App\Entity\Donateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DonateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom'
            ])
            ->add('email')
            ->add('telephone', TextType::class,[
                'label' => 'Téléphone'
            ])
            ->add('adresse', TextType::class, [
                'label' => 'Adresse'
            ])
            ->add('peutSeRendreEnInde', ChoiceType::class, [
                'label' => 'Souhaitez-vous vous rendre en Inde ?',
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'expanded' => true, // Permet de choisir entre "Oui" et "Non" via des boutons radio
            ])
            ->add('TypeDeParrainage', ChoiceType::class, [
                'label' => 'Comment souhaitez-vous nous aider?',
                'choices' => [
                    'Parrainage de la scolarité d’un enfant' => '25 €/mois',
                    'Bourse pour un étudiant' => '25 €/mois',
                    'Financement des soutiens scolaires'=>'à partir de 10€/mois',
                    'Dons ponctuels'=>'versemnts libres'

                ],
                'attr' => ['class' => 'form-control'], // permet d'affiche une liste déroulante
            ])


            ->add('motivation', TextareaType::class, [ // Champ de type texte
                'label' => 'Si vous le souhaitez, nous serions ravis de connaitre votre motivations pour votre démarche',
                'required' => false, // Vous pouvez définir cette option en fonction de vos besoins
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Donateur::class,
        ]);
    }
}
