<?php

namespace App\Form;

use App\Form\Model\LoginData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => [
                    'class' => 'form-control form-control-sm',
                ],
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe',
                'attr' => [
                    'class' => 'form-control form-control-sm',
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'SE CONNECTER',
                'attr' => [
                    'class' => 'rn-btn',
                ],
            ])
            // Les champs suivants sont utilisés pour la protection anti-spam et ne sont pas mappés à LoginData
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
            'data_class' => LoginData::class,
        ]);
    }
}