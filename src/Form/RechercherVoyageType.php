<?php

namespace App\Form;

use App\Entity\Ville;
use App\Entity\Voyage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use PUGX\AutocompleterBundle\Form\Type\AutocompleteType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class RechercherVoyageType extends AbstractType
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

            
           /* ->add('ville_arrivee',EntityType::class, [
                // looks for choices from this entity
                'class' => Ville::class,
            
                //
                'choice_label' => 'villeNomReel'])*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Voyage::class,
        ]);
    }
}
