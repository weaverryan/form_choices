<?php

namespace AppBundle\Form;

use AppBundle\Entity\Category;
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
                    'Main Statuses' => [
                        'Yes' => 'stock_yes',
                        'No' => 'stock_no',
                    ],
                    'Other Statuses' => [
                        'Backordered' => 'stock_backordered',
                        'yes_later' => 'stock_yes_second',
                    ]
                ],
                'expanded' => false,
                'multiple' => false,
                'choices_as_values' => true,
                'choice_label' => function($choiceVal, $choiceKey, $choiceIndex) {
                    if ($choiceKey == 'yes_later') {
                        // we're purposefully trying to have *two* yes'es
                        return 'Yes';
                    }

                    return $choiceKey;
                },
                // this only seems to affect checkboxes and radio buttons
                // it also only seems to be used in the generation of the *id*,
                // not any name attributes as far as I can see
                'choice_name' => function($choiceVal, $choiceKey, $choiceIndex) {
                    return $choiceVal;
                },
                'choice_value' => function($choiceVal) {
                    // this changes things like stock_yes_second to STOCK_YES_SECOND
                    // *in the HTML* - the underlying data is *still* stock_yes_second
                    return strtoupper($choiceVal);
                }
            ])
            ->add('category', 'choice', [
                'choices' => [
                    new Category('Cat1'),
                    new Category('Cat2'),
                    new Category('Cat3')
                ],
                'choices_as_values' => true,
                'choice_label' => function($choiceVal, $choiceKey, $choiceIndex) {
                    /** @var Category $choiceVal */

                    return strtoupper($choiceVal->getName());
                },
                'choice_value' => function ($choiceVal) {
                    /** @var Category $choiceVal */

                    return strtolower($choiceVal->getName()).'_foo';
                },
                'choice_attr' => function($choiceVal, $choiceKey, $choiceIndex) {
                    return ['class' => 'category_'.strtolower($choiceVal->getName())];
                },
                'group_by' => function($choiceVal, $choiceKey, $choiceIndex) {
                    if (rand(0, 1) == 1) {
                        return 'Group A';
                    }

                    return 'Group B';
                }
            ])
            ;
    }
}
