<?php

namespace projetGSB\projetGsbBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use projetGSB\projetGsbBundle\Form\ResearchInvoiceAccountantForm;
use projetGSB\projetGsbBundle\Form\ResearchInvoiceVisitorForm;

class ResearchHistoricInvoiceAccountantForm extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $mois = array('01' => 'Janvier', '02' => 'Février', '03' => 'Mars', '04' => 'Avril', '05' => 'Mai', '06' => 'Juin',
            '07' => 'Juillet', '08' => 'Août', '09' => 'Septembre', '10' => 'Octobre', '11' => 'Novembre', '12' => 'Decembre');

        $builder
            ->add('nom', 'text',['required' => false ])

            ->add('mois', 'choice', ['choices'=>$mois,
                'empty_value' => 'Tout', 'required' => false])
                
            ->add('annee', 'choice', ['choices'=>[
                '' => 'Toute',
                Date('Y') => Date('Y'),
                Date('Y')-1 => Date('Y')-1,
                Date('Y')-2 => Date('Y')-2
            ], 'required'=>false])
            
            ->add('etat', 'entity', ['class' => 'projetGSBprojetGsbBundle:EtatFiche',
                    'property' => 'libelle', 'empty_value' => 'Tout', 'required' => false,
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('e')
                                ->where('e.libelle != :etat1 AND e.libelle != :etat2')
                                    ->setParameter('etat1', 'En cours')
                                    ->setParameter('etat2', 'Cloturée');
                    }]);
        }

    /**
     * @return string
     */
    public function getName() {
        return 'projetgsb_projetgsbbundle_ResearchHistoricInvoiceAccountantForm';
    }

}
