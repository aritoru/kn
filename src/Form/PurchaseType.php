<?php
namespace App\Form;

use App\Entity\Purchase;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PurchaseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                    'required'   => true,
                    'attr' => [
                        'placeholder' => 'Nombre y dos apellidos',
                    ],
                    'label' => 'nombre completo'
                    ]
            )
            ->add('email', EmailType::class, [
                    'required'   => true,
                    'attr' => [
                        'placeholder' => 'Recibirás información en este email',
                    ],

                    'label' => 'email'
                ]
            )
            ->add('phone', TelType::class, [
                    'required'   => true,
                    'attr' => [
                        'placeholder' => 'Fijo o móvil',
                    ],

                    'label' => 'teléfono'
                ]
            )
            ->add('size', ChoiceType::class, [
                'required'   => true,
                'placeholder' => 'Elige una talla para la camiseta',
                'choices' => [
                    'Chica' => [
                        'XS' => 'girl_xs',
                        'S' => 'girl_s',
                        'M' => 'girl_m',
                        'L' => 'girl_l',
                        'XL' => 'girl_xl',
                    ],
                    'Chico' => [
                        'XS' => 'boy_xs',
                        'S' => 'boy_s',
                        'M' => 'boy_m',
                        'L' => 'boy_l',
                        'XL' => 'boy_xl',
                    ]]
                ,'label' => 'Talla'])
            ->add('save', SubmitType::class, [
                'label' => 'realizar pedido',
                'attr' => [
                    'class' => 'px-2 btn btn-primary btn-dark'
                ]])

        ;

    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Purchase::class,
        ));
    }
}