<?php

namespace projetGSB\projetGsbBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UnfixedPriceLineValidationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('motifRefus', 'textarea');
        $builder->add('etat');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'projetGSB\projetGsbBundle\Entity\LigneHorsForfait',
        ));
    }

    public function getName()
    {
        return 'projetgsb_projetgsbbundle_UnfixedPriceLineValidationForm';
    }
}