<?php

namespace App\Form;

use App\Entity\Song;
use App\Entity\Target;
use App\Entity\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SongType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('author')
            ->add('period')
            ->add('lyrics')
            ->add('type', EntityType::class, [
                'class' => Type::class,
                'choice_label' => 'name',
                'label' => 'Niveau',
                'expanded' => true,
                'multiple' => true,
        ])
            ->add('targets', EntityType::class, [
                'class' => Target::class,
                'choice_label' => 'name',
                'label' => 'Période scolaire',
                'expanded' => true,
                'multiple' => true,
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Song::class,
        ]);
    }
}
