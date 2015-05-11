<?php

namespace projetGSB\projetGsbBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use projetGSB\projetGsbBundle\Form\FixedPriceLineValidationForm;
use projetGSB\projetGsbBundle\Form\UnfixedPriceLineValidationForm;

class ValidationForm extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('listeLigneForfait', 'collection', array('type' => new FixedPriceLineValidationForm()));
        $builder->add('listeLigneHorsForfait', 'collection', array('type' => new UnfixedPriceLineValidationForm()));
        $builder->add('submit', 'submit', [
            'label' => 'Enregistrer',
            'attr' => ['class' => 'btn btn-success btn-validation']
        ]);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'projetGSB\projetGsbBundle\Entity\FicheFrais',
        ));
    }

    public function getName()
    {
        return 'projetgsb_projetgsbbundle_validationForm';
    }
}