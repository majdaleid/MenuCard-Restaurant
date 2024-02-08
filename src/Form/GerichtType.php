<?php

namespace App\Form;

use App\Entity\Gericht;
use App\Entity\Kategorie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GerichtType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('bild', FileType::class)
            ->add('beschreibung')
            ->add('kategorie', EntityType::class, [
                'class' => Kategorie::class
            ])
            ->add('preis')
            ->add('speichern', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Gericht::class,
        ]);
    }
}
