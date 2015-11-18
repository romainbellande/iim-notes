<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GradeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('value', 'text', array('label' => 'Value', 'label_attr' => array('class' => 'text-primary'), 'attr' => array('class' => 'form-control')))
            ->add('student', 'entity', ['class' => 'AppBundle:Student'],array('label' => 'Student'))
            ->add('exam', 'entity', ['class' => 'AppBundle:Exam', 'choice_label' => 'name'], array('label' => 'Exam', 'attr' => array('class' => 'form-control')))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Grade'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_grade';
    }
}
