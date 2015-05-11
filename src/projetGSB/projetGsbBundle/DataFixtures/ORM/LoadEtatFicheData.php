<?php

namespace projetGSB\projetGsbBundle\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use projetGSB\projetGsbBundle\Entity\EtatFiche;

class LoadEtatFicheData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
        $etatF1 = new EtatFiche();
        $etatF1 -> setLibelle('En cours');
        
        $etatF2 = new EtatFiche();
        $etatF2 -> setLibelle('Cloturée');

        $etatF3 = new EtatFiche();
        $etatF3 -> setLibelle('Validée');
        
        $etatF4 = new EtatFiche();
        $etatF4 -> setLibelle('Remboursée');        
        
        
        $em->persist($etatF1);
        $em->persist($etatF2);
        $em->persist($etatF3);
        $em->persist($etatF4);
        $em->flush();
        
        $this->addReference('EtatFiche-etat1', $etatF1);
        $this->addReference('EtatFiche-etat2', $etatF2);
        $this->addReference('EtatFiche-etat3', $etatF3);
        $this->addReference('EtatFiche-etat4', $etatF4);
    }
    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}
