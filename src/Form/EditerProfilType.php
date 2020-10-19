<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class EditerProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nom')
        ->add('prenom')
        ->add('date_naissance', BirthdayType::class, [
            'placeholder' => [
                'year' => 'Année', 'month' => 'Mois', 'day' => 'Jour',
            ],
            'format' => 'dd/MM/yyyy',
            'widget' => 'single_text'
        ])
        ->add('telephone',TelType::class)
        ->add('bio')
        ->add('fumeur', CheckboxType::class, [
            'label'    => 'Fumez vous?',
            'required' => false,
        ])
        ->add('musique')
        ->add('discussion')
        ->add('passager_fumeur')
        ->add('passager_animal')
        /*->add('email')
        ->add('motdepasse', PasswordType::class)
        ->add('confirm_motdepasse', PasswordType::class)*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
