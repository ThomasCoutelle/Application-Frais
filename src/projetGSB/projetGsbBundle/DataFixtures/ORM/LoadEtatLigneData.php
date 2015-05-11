<?php

namespace projetGSB\projetGsbBundle\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use projetGSB\projetGsbBundle\Entity\EtatLigne;

class LoadEtatLigneData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {        
        $etatL1 = new EtatLigne();
        $etatL1 -> setLibelle('Refusée');

        $etatL2 = new EtatLigne();
        $etatL2 -> setLibelle('Validée');
        
        $em->persist($etatL1);
        $em->persist($etatL2);
        $em->flush();
        
        $this->addReference('EtatLigne-etat1', $etatL1);
        $this->addReference('EtatLigne-etat2', $etatL2);
    }
    public function getOrder()
    {
        return 3; // the order in which fixtures will be loaded
    }
}

