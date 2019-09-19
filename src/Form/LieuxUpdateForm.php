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

use App\Entity\Lieux;
use App\Entity\Villes;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LieuxUpdateForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
         $builder
            ->add('nomlieu', TextType::class, ['label' => 'Nom du lieu'])
            ->add('rue', TextType::class, ['label' => 'Rue'])
            ->add('latitude', NumberType::class, ['label' => 'Position (Latitude)'])
            ->add('longitude', NumberType::class, ['label' => 'Position (Longitude)'])
            ->add('villesville', EntityType::class, ['label' => 'Ville', 'class' => Villes::class,'choice_label' => 'nomVille'])
            ->add('save', SubmitType::class, ['label' => 'Enregistrer']);
    }
}