<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AdminType extends AbstractType
{

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Admin'
        ));
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder
          ->add('username', 'text', array('label' => 'Username', 'label_attr' => array('class' => 'text-primary'), 'attr' => array('class' => 'form-control')))
          ->add('email', 'text', array('label' => 'Email', 'label_attr' => array('class' => 'text-primary'), 'attr' => array('class' => 'form-control')))
          ->add('plainPassword', 'password', array('label' => 'Password', 'label_attr' => array('class' => 'text-primary'), 'attr' => array('class' => 'form-control')))
      ;
    }
    public function getParent()
        {
            return 'fos_user_registration';
        }


    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_admin';
    }
}
