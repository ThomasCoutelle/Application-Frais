<?php

namespace projetGSB\projetGsbBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LigneHorsForfaitType extends AbstractType
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
            ->add('motifRefus')
            ->add('ficheFrais')
            ->add('etat')
            ->add('justificatif')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'projetGSB\projetGsbBundle\Entity\LigneHorsForfait'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'projetgsb_projetgsbbundle_lignehorsforfait';
    }
}
