<?php

namespace projetGSB\projetGsbBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FixedPriceLineValidationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('motifRefus', 'textarea', [ 'required' => false, ]);
        $builder->add('etat');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'projetGSB\projetGsbBundle\Entity\LigneForfait',
        ));
    }

    public function getName()
    {
        return 'projetgsb_projetgsbbundle_fixedPriceLineValidationForm';
    }
}