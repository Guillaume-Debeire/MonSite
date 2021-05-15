<?php

namespace App\Form;

use App\Entity\Picture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class PictureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $applications = 
        $builder
            ->add('name')
            ->add('picture', FileType::class, [
                'mapped' => false,
                'label' => 'Photo de la plante',
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '2M'
                    ])
                ]
            ])
            ->add('application', null, [
                'label' => 'application',
                'expanded' => false,
            ])
            ->add('parcours', null, [
                'label' => 'études',
                'expanded' => false,
            ])
            ->add('exercice', null, [
                'label' => 'exercice',
                'expanded' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Picture::class,
        ]);
    }
}
