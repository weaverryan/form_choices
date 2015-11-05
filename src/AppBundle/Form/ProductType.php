<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text')
            ->add('stockStatus', 'choice', [
                'label' => 'Stock Status',
                'choices' => [
                    'stock_yes' => 'Yes',
                    'stock_no' => 'No',
                    'stock_backordered' => 'Backordered'
                ]
            ]);
    }
}
