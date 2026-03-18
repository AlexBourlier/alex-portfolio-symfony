<?php

namespace App\Form;

use App\Form\Model\ContactData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Votre nom',
                'attr' => [
                    'class' => 'form-control form-control-lg',
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => [
                    'class' => 'form-control form-control-sm',
                ],
            ])
            ->add('subject', TextType::class, [
                'label' => 'Sujet',
                'attr' => [
                    'class' => 'form-control form-control-sm',
                ],
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Votre message',
                'attr' => [
                    'cols' => 30,
                    'rows' => 10,
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'ENVOYER LE MESSAGE',
                'attr' => [
                    'class' => 'rn-btn',
                ],
            ])
            // Les champs suivants sont utilisés pour la protection anti-spam et ne sont pas mappés à ContactData
            ->add('website', TextType::class, [
                'mapped' => false,
                'required' => false,
                'label' => false,
                'attr' => [
                    'autocomplete' => 'off',
                    'tabindex' => '-1',
                    'style' => 'display:none;',
                ],
            ])
            // Ce champ peut être utilisé pour enregistrer la date et l'heure de soumission du formulaire, ce qui peut aider à détecter les soumissions automatisées
            ->add('submittedAt', HiddenType::class, [
                'mapped' => false,
                'data' => (new \DateTime())->format('Y-m-d H:i:s'),
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactData::class,
        ]);
    }
}