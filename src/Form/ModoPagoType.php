<?php

namespace App\Form;

use App\Entity\ModoPago;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModoPagoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('n_tarjeta')
            ->add('cvc')
            ->add('caducidad_mes')
            ->add('caducidad_ano')
            ->add('propietario_tarjeta')
            //->add('cliente')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ModoPago::class,
        ]);
    }
}
