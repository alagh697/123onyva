<?php

namespace App\Form;

use App\Entity\Ville;
use App\Entity\Voyage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use PUGX\AutocompleterBundle\Form\Type\AutocompleteType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ProposerVoyageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ville_depart',EntityType::class, [
                // looks for choices from this entity
                'class' => Ville::class,
                'choice_label' => 'villeNomReel',
                'label' => 'Ville de départ'
            
                ])
            ->add('ville_arrivee',EntityType::class, [
                    // looks for choices from this entity
                'class' => Ville::class,
                'choice_label' => 'villeNomReel',
                'label' => 'Ville d\'arivée'
            
                ])
            ->add('dateDepart', DateTimeType::class,['data'   => new \DateTime(),
                'attr'   => ['min' => ( new \DateTime() )->format('Y-m-d H:i:s')],
                'date_widget' => 'single_text',
                'time_widget' => 'single_text',
                'label' => 'Date de départ']
                )
            ->add('dateArrivee', DateTimeType::class,['data'   => new \DateTime(),
                'attr'   => ['min' => ( new \DateTime() )->format('Y-m-d H:i:s')],
                'date_widget' => 'single_text',
                'time_widget' => 'single_text',
                'label' => 'Date d\'arivée']
            )
            ->add('nbPassager')
            ->add('prix', MoneyType::class)
            ->add('vehiculeDescription',TextareaType::class)
            
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Voyage::class,
        ]);
    }
}
