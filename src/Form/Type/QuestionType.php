<?php

namespace App\Form\Type;

use App\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Neved',
            'row_attr' => [
                'class' => 'input-group-text',
            ],])

            ->add('email', EmailType::class, [
                'label' => 'E-mail címed',
                'row_attr' => [
                    'class' => 'input-group',
                ],
            ])

            ->add('message', TextType::class, ['label' => 'Üzenet szövege',
            'row_attr' => [
                'class' => 'input-group',
            ],])
            ->add('save', SubmitType::class, ['label' => 'Küldés',
            'row_attr' => [
                'class' => 'input-group',
            ],])
        ;
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Question::class,
        ]);
    }
}
?>