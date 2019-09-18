<?php
// src/Form/SortiesForm.php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

use App\Entity\Sorties;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SortiesForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class)
            ->add('datedebut', DateType::class, [
                'input'  => 'datetime',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                ])
            ->add('duree', NumberType::class)
            ->add('datecloture', DateType::class, [
                'input'  => 'datetime',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                ])
            ->add('nbinscriptionsmax', NumberType::class)
            ->add('descriptioninfos', TextType::class)
            ->add('urlPhoto', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Send'])
        ;
}

public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sorties::class,
        ]);
    }

}