<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    private $class;

    /**
     * @param string $class The User class name
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullName', 'text', array(
                'label' => 'form.fullname',
                'translation_domain' => 'registration',
                'required' => true,
//                'placeholder' => 'placeholder.fullname'
            ))
            ->add('email', 'email', array(
                'label' => 'form.email',
                'translation_domain' => 'registration',
                'required' => true,
//                'placeholder' => 'placeholder.email'
            ))
            ->add('username', null, array(
                'label' => 'form.username',
                'translation_domain' => 'registration',
                'required' => true,
//                'placeholder' => 'placeholder.username',
            ))
            ->add('roles', 'choice', array(
                'choices'   => array(
                    'ROLE_AUTHOR'   => 'Author',
                    'ROLE_SUBSCRIBER' => 'Subscriber',
                ),
                'label' => 'form.type',
                'translation_domain' => 'registration',
                'multiple'  => true,
                'required' => true,
            ))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'registration'),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
//            ->add('plainPassword', 'repeated', array(
//                'type' => 'password',
//                'options' => array('translation_domain' => 'FOSUserBundle'),
//                'first_options' => array('label' => 'form.password'),
//                'second_options' => array('label' => 'form.password_confirmation'),
//                'invalid_message' => 'fos_user.password.mismatch',
//            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
            'intention'  => 'registration',
        ));
    }

    public function getName()
    {
        return 'cls_user_registration';
    }
}
