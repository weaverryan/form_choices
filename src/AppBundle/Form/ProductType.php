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
                    'Yes' => 'stock_yes',
                    'No' => 'stock_no',
                    'Backordered' => 'stock_backordered',
                ],
                'choices_as_values' => true,
            ]);
    }
}
