<?php

namespace App\Form;

use App\Entity\Productos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('stock')
            ->add('dimensiones')
            ->add('color')
            ->add('precio')
            ->add('proveedors')

            /* TODO: COMO HACER PARA QUE ME SALGAN LAS CATEGORIAS CREADAS 
                    Y NO ME SALGA ERROR DE NO PODER CONVERTIR ARRAY A STRING */
           /*  ->add('Producto.categoria') */
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Productos::class,
        ]);
    }
}
