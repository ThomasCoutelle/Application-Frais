<?php

namespace projetGSB\projetGsbBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LigneForfaitType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('repasMidi')
            ->add('nuitees')
            ->add('etape')
            ->add('km')
            ->add('dateJourDebut')
            ->add('dateJourFin')
            ->add('motifRefus')
            ->add('region')
            ->add('vehicule')
            ->add('etat')
            ->add('ficheFrais')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'projetGSB\projetGsbBundle\Entity\LigneForfait'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'projetgsb_projetgsbbundle_ligneforfait';
    }
}
