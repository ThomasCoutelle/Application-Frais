<?php

namespace projetGSB\projetGsbBundle\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use projetGSB\projetGsbBundle\Entity\Vehicule;

class LoadVehiculeData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
        $vehicule1 = new Vehicule();
        $vehicule1 -> setPuissance(4);
        $vehicule1 -> setType('Essence');
        $vehicule1 -> setFraisKm(0.62);
                
        $vehicule2 = new Vehicule();
        $vehicule2 -> setPuissance(4);
        $vehicule2 -> setType('Diesel');
        $vehicule2 -> setFraisKm(0.52);
        
        $vehicule3 = new Vehicule();
        $vehicule3 -> setPuissance(5);
        $vehicule3 -> setType('Essence');
        $vehicule3 -> setFraisKm(0.67);
        
        $vehicule4 = new Vehicule();
        $vehicule4 -> setPuissance(5);
        $vehicule4 -> setType('Diesel');
        $vehicule4 -> setFraisKm(0.58);
        
        $em->persist($vehicule1);
        $em->persist($vehicule2);
        $em->persist($vehicule3);
        $em->persist($vehicule4);
        $em->flush();
       
        $this->addReference('Vehicule-vehicule1', $vehicule1);
        $this->addReference('Vehicule-vehicule2', $vehicule2);
        $this->addReference('Vehicule-vehicule3', $vehicule3);
        $this->addReference('Vehicule-vehicule4', $vehicule4);
        
    }
    public function getOrder()
    {
        return 5; // the order in which fixtures will be loaded
    }
}
