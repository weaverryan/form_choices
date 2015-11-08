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
                    'yes_later' => 'stock_yes_second',
                ],
                'choices_as_values' => true,
                'choice_label' => function($choiceVal, $choiceKey, $choiceIndex) {
                    if ($choiceKey == 'yes_later') {
                        // we're purposefully trying to have *two* yes'es
                        return 'Yes';
                    }

                    return $choiceKey;
                },
            ]);
    }
}
