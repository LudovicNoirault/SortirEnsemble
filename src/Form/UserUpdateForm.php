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


use App\Entity\Participants;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserUpdateForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pseudo', TextType::class, ['label' => 'Pseudo choisi'])
            ->add('prenom', TextType::class, ['label' => 'Prénom '])
            ->add('nom', TextType::class, ['label' => 'Nom'])
            ->add('telephone', TextType::class, ['label' => 'Numéro de téléphone renseigné'])
            ->add('save', SubmitType::class, ['label' => 'Envoyer'])
        ;
    }
}