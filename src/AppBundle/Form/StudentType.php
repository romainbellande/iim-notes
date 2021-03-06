<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StudentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'text', array('label' => 'Email', 'label_attr' => array('class' => 'text-primary'), 'attr' => array('class' => 'form-control')))
            ->add('firstName', 'text', array('label' => 'First name', 'label_attr' => array('class' => 'text-primary'), 'attr' => array('class' => 'form-control')))
            ->add('lastName', 'text', array('label' => 'Last name', 'label_attr' => array('class' => 'text-primary'), 'attr' => array('class' => 'form-control')))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Student'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_student';
    }
}
