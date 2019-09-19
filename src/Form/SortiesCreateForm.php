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
            ->add('nom', TextType::class, ['label' => 'Nom de la sortie'])
            ->add('datedebut', DateTimeType::class, ['label' => 'Date de début', 'input'  => 'datetime', 'widget' => 'single_text'])
            ->add('duree', NumberType::class, ['label' => 'Durée de la sortie'])
            ->add('datecloture', DateTimeType::class, ['label' => 'Date de clôture', 'input'  => 'datetime', 'widget' => 'single_text'])
            ->add('nbinscriptionsmax', NumberType::class, ['label' => 'Nombre maximum de participants'])
            ->add('descriptioninfos', TextType::class, ['label' => 'Description de la sortie'])
            ->add('urlPhoto', TextType::class, ['label' => 'Photo transmise'])
            ->add('organisateur', NumberType::class, ['label' => 'Organisateur'])
            ->add('lieuxlieu', EntityType::class, ['label' => 'Lieu de la sortie', 'class' => Lieux::class,'choice_label' => 'nomLieu'])
            ->add('etatsetat', EntityType::class, ['label' => 'Etat de la sortie', 'class' => Etats::class,'choice_label' => 'libelle'])
            ->add('save', SubmitType::class, ['label' => 'Envoyer'])
        ;
    }
}