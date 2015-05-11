<?php

namespace projetGSB\projetGsbBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class ResearchInvoiceVisitorForm extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
//        $annee = array();
//        for ($i = 0; $i < 3; $i++) {
//            $annee[$i] = date('Y') - $i;
//        }
//        var_dump($annee);
//        exit(0);
        $mois = array('01' => 'Janvier', '02' => 'Février', '03' => 'Mars', '04' => 'Avril', '05' => 'Mai', '06' => 'Juin',
            '07' => 'Juillet', '08' => 'Août', '09' => 'Septembre', '10' => 'Octobre', '11' => 'Novembre', '12' => 'Decembre');

        $builder
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
                                ->where('e.libelle != :etat')
                                    ->setParameter('etat', 'En cours');
                    }]);
    }

    /**
     * @return string
     */
    public function getName() {
        return 'projetgsb_projetgsbbundle_ResearchInvoiceVisitorForm';
    }

}
