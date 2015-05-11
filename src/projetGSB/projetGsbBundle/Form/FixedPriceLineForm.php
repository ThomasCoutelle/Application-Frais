<?php

namespace projetGSB\projetGsbBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FixedPriceLineForm extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateJourDebut')
            ->add('dateJourFin')
            ->add('region')
            ->add('repasMidi')
            ->add('nuitees')
            ->add('etape')
            ->add('km')
            ->add('vehicule')
//            ->add('etat')
//            ->add('ficheFrais')
        ;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return 'projetgsb_projetgsbbundle_FixedPriceLineForm';
    }
}