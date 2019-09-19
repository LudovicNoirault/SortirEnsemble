<?php
// src/Form/SortiesForm.php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;

use App\Entity\Sites;
use App\Entity\Lieux;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SitesUpdateForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomSite', TextType::class, ['label' => 'Nom du Site'])
            ->add('lieuxlieu', EntityType::class, ['label' => 'Lieu de la sortie', 'class' => Lieux::class,'choice_label' => 'nomLieu'])
            ->add('save', SubmitType::class, ['label' => 'Enregistrer']);
    }
}