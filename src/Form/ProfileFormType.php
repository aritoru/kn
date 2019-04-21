<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class ProfileFormType extends AbstractType
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
            ->add('email', HiddenType::class, [
                'required'   => true,
            ])
            ->add('phone', TelType::class, [
                    'required'   => true,
                    'attr' => [
                        'placeholder' => 'Fijo o móvil',
                    ],

                    'label' => 'Teléfono'
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
            ->add('address', TextType::class, [
                    'required'   => true,
                    'attr' => [
                        'placeholder' => 'Dirección completa. Utilizaremos esta dirección como dirección de envío.',
                    ],
                    'label' => 'Dirección completa'
                ]
            )
            ->add('city', TextType::class, [
                    'required'   => true,
                    'attr' => [
                        'placeholder' => 'Municipio',
                    ],
                    'label' => 'Municipio'
                ]
            )
            ->add('zipcode', NumberType::class, [
                    'required'   => true,
                    'attr' => [
                        'placeholder' => 'Código Postal',
                    ],
                    'label' => 'Código Postal'
                ]
            )
            ->add('province', ChoiceType::class, [
                'required'   => true,
                'placeholder' => 'Provincia',
                'choices' => [
                    'A Coruña' => 'A Coruña',
                    'Álava' => 'Álava',
                    'Albacete' => 'Albacete',
                    'Alicante' => 'Alicante',
                    'Almería' => 'Almería',
                    'Asturias' => 'Asturias',
                    'Ávila' => 'Ávila',
                    'Badajoz' => 'Badajoz',
                    'Baleares' => 'Baleares',
                    'Barcelona' => 'Barcelona',
                    'Burgos' => 'Burgos',
                    'Cáceres' => 'Cáceres',
                    'Cádiz' => 'Cádiz',
                    'Cantabria' => 'Cantabria',
                    'Castellón' => 'Castellón',
                    'Ciudad Real' => 'Ciudad Real',
                    'Córdoba' => 'Córdoba',
                    'Cuenca' => 'Cuenca',
                    'Girona' => 'Girona',
                    'Granada' => 'Granada',
                    'Guadalajara' => 'Guadalajara',
                    'Gipuzkoa' => 'Gipuzkoa',
                    'Huelva' => 'Huelva',
                    'Huesca' => 'Huesca',
                    'Jaén' => 'Jaén',
                    'La Rioja' => 'La Rioja',
                    'Las Palmas' => 'Las Palmas',
                    'León' => 'León',
                    'Lérida' => 'Lérida',
                    'Lugo' => 'Lugo',
                    'Madrid' => 'Madrid',
                    'Málaga' => 'Málaga',
                    'Murcia' => 'Murcia',
                    'Navarra' => 'Navarra',
                    'Ourense' => 'Ourense',
                    'Palencia' => 'Palencia',
                    'Pontevedra' => 'Pontevedra',
                    'Salamanca' => 'Salamanca',
                    'Santa Cruz de Tenerife' => 'Santa Cruz de Tenerife',
                    'Segovia' => 'Segovia',
                    'Sevilla' => 'Sevilla',
                    'Soria' => 'Soria',
                    'Tarragona' => 'Tarragona',
                    'Teruel' => 'Teruel',
                    'Toledo' => 'Toledo',
                    'Valencia' => 'Valencia',
                    'Valladolid' => 'Valladolid',
                    'Vizcaya' => 'Vizcaya',
                    'Zamora' => 'Zamora',
                    'Zaragoza' => 'Zaragoza',
                    ]
                ,'label' => 'Provincia']
            )

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
