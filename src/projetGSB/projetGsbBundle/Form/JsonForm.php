<?php

namespace projetGSB\projetGsbBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class JsonForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('json', 'file')
                ->add('submit', 'submit', [
                    'label' => 'Synchroniser'
                ]);
    }


    public function getName()
    {
        return 'projetgsb_projetgsbbundle_jsonForm';
    }
}