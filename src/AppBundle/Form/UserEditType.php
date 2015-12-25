<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserEditType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullName', 'text', array(
                'translation_domain' => 'registration',
                'label' => 'form.fullname',
                'required' => true,
//                'placeholder' => 'placeholder.fullname'
            ))
            ->add('email', 'email', array(
                'translation_domain' => 'registration',
                'label' => 'form.email',
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
                    'ROLE_ADMIN' => 'Admin',
                    'ROLE_SUPER_ADMIN' => 'Super Admin',
                    'ROLE_AUTHOR'   => 'Author',
                    'ROLE_SUBSCRIBER' => 'Subscriber',
                ),
                'label' => 'form.type',
                'translation_domain' => 'registration',
                'multiple'  => true,
                'required' => true,
            ))

            ->add('enabled');
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cls_usersbundle_user';
    }
}
