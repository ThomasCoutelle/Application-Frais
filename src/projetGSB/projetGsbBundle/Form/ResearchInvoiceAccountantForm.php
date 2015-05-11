<?php

namespace projetGSB\projetGsbBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class ResearchInvoiceAccountantForm extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
            ->add('nom', 'text',['required' => false ]);
        }

    /**
     * @return string
     */
    public function getName() {
        return 'projetgsb_projetgsbbundle_ResearchInvoiceAccountantForm';
    }

}
