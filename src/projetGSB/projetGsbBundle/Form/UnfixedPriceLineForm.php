<?php

namespace projetGSB\projetGsbBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use projetGSB\projetGsbBundle\Entity\Document;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UnfixedPriceLineForm extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateJour')
            ->add('montant')
            ->add('libelle')
            ->add('justificatif', new UploadFileForm(),[ 'required' => false, ]);
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return 'projetgsb_projetgsbbundle_UnfixedPriceLineForm';
    }
}

