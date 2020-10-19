<?php

namespace App\Form;

use App\Entity\Paiement;
use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('paiement', EntityType::class, [
                // looks for choices from this entity
            'class' => Paiement::class,
            'label' => 'Moyen de paiement',
            'choice_label' => 'libelle',
            'multiple' => false,
            'expanded' => true,
            /*'attr'   => ['class'=> 'custom-control-input'],
            'label_attr'=> ['class'=> 'custom-control-label']*/
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
