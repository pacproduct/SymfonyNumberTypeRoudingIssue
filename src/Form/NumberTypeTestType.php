<?php

namespace App\Form;

use App\Controller\MainController;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NumberTypeTestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'nt_noScale_noRounding',
                NumberType::class,
                [
                    'label' => 'NumberType - No scale + No rounding mode',
                    'attr' => array(
                        'placeholder' => MainController::TEST_VALUE,
                    ),
                    'required' => false,
                    'help' => 'Behavior KO: the source number is not rounded "half up": it is rounded "half even".',
                ]
            )
            ->add(
                'nt_noScale_rounding',
                NumberType::class,
                [
                    'label' => 'NumberType - No scale + Rounding mode "ROUND_HALFUP"',
                    'attr' => array(
                        'placeholder' => MainController::TEST_VALUE,
                    ),
                    'rounding_mode' => \NumberFormatter::ROUND_HALFUP,
                    'required' => false,
                    'help' => 'Behavior KO: the source number is not rounded "half up": it is rounded "half even".',
                ]
            )
            ->add(
                'nt_scale_noRounding',
                NumberType::class,
                [
                    'label' => 'NumberType - Scale "3" + No rounding mode',
                    'attr' => array(
                        'placeholder' => MainController::TEST_VALUE,
                    ),
                    'scale' => 3,
                    'required' => false,
                    'help' => 'Behavior OK: the source number is rounded "half up". Although, the number of decimals is now enforced to 3 in the field (i.e. if you input "1.2", the form will display "1.200").',
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}
