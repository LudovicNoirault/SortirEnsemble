<?php
// src/Form/SortiesForm.php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;

use App\Entity\Sorties;
use App\Entity\Lieux;
use App\Entity\Etats;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SortiesCreateForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class)
            ->add('datedebut', DateTimeType::class, [
                'input'  => 'datetime',
                'widget' => 'single_text'
                ])
            ->add('duree', NumberType::class)
            ->add('datecloture', DateTimeType::class, [
                'input'  => 'datetime',
                'widget' => 'single_text'
                ])
            ->add('nbinscriptionsmax', NumberType::class)
            ->add('descriptioninfos', TextType::class)
            ->add('urlPhoto', TextType::class)
            ->add('organisateur', NumberType::class)
           ->add('lieuxlieu', EntityType::class, ['class' => Lieux::class,'choice_label' => 'nomLieu',])
            ->add('etatsetat', EntityType::class, ['class' => Etats::class,'choice_label' => 'libelle',])
            ->add('save', SubmitType::class, ['label' => 'Send'])
        ;
    }
}