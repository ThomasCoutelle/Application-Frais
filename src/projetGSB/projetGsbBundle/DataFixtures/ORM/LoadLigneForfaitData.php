<?php

namespace projetGSB\projetGsbBundle\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use projetGSB\projetGsbBundle\Entity\LigneForfait;

class LoadLigneForfaitData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
        $ligneForfait1 = new LigneForfait();
        $ligneForfait1 -> setRepasMidi(3);
        $ligneForfait1 -> setNuitees(2);
        $ligneForfait1 -> setEtape(0);
        $ligneForfait1 -> setKm(100);
        $ligneForfait1 -> setEtat($em->merge($this->getReference('EtatLigne-etat1')));
        $ligneForfait1 -> setFicheFrais($em->merge($this->getReference('FicheFrais-ficheFrais1-1')));
        $ligneForfait1 -> setRegion($em->merge($this->getReference('Region-region1')));
        $ligneForfait1 -> setDateJourDebut(13);
        $ligneForfait1 -> setDateJourFin(16);
        $ligneForfait1 -> setVehicule($em->merge($this->getReference('Vehicule-vehicule1')));

        $ligneForfait2 = new LigneForfait();
        $ligneForfait2 -> setRepasMidi(3);
        $ligneForfait2 -> setNuitees(2);
        $ligneForfait2 -> setEtape(0);
        $ligneForfait2 -> setKm(100);
        $ligneForfait2 -> setEtat($em->merge($this->getReference('EtatLigne-etat2')));
        $ligneForfait2 -> setFicheFrais($em->merge($this->getReference('FicheFrais-ficheFrais1-1')));
        $ligneForfait2 -> setRegion($em->merge($this->getReference('Region-region1')));
        $ligneForfait2 -> setDateJourDebut(06);
        $ligneForfait2 -> setDateJourFin(08);
        $ligneForfait2 -> setVehicule($em->merge($this->getReference('Vehicule-vehicule1')));
                
        $ligneForfait3 = new LigneForfait();
        $ligneForfait3 -> setRepasMidi(5);
        $ligneForfait3 -> setNuitees(0);
        $ligneForfait3 -> setEtape(5);
        $ligneForfait3 -> setKm(150);
        $ligneForfait3 -> setEtat($em->merge($this->getReference('EtatLigne-etat1')));
        $ligneForfait3 -> setFicheFrais($em->merge($this->getReference('FicheFrais-ficheFrais1-2')));
        $ligneForfait3 -> setRegion($em->merge($this->getReference('Region-region2')));
        $ligneForfait3 -> setDateJourDebut(14);
        $ligneForfait3 -> setDateJourFin(20);
        $ligneForfait3 -> setVehicule($em->merge($this->getReference('Vehicule-vehicule2')));

        $ligneForfait4 = new LigneForfait();
        $ligneForfait4 -> setRepasMidi(2);
        $ligneForfait4 -> setNuitees(1);
        $ligneForfait4 -> setEtape(0);
        $ligneForfait4 -> setKm(150);
        $ligneForfait4 -> setEtat($em->merge($this->getReference('EtatLigne-etat2')));
        $ligneForfait4 -> setFicheFrais($em->merge($this->getReference('FicheFrais-ficheFrais1-2')));
        $ligneForfait4 -> setRegion($em->merge($this->getReference('Region-region2')));
        $ligneForfait4 -> setDateJourDebut(09);
        $ligneForfait4 -> setDateJourFin(10);
        $ligneForfait4 -> setVehicule($em->merge($this->getReference('Vehicule-vehicule2')));
        
        $ligneForfait5 = new LigneForfait();
        $ligneForfait5 -> setRepasMidi(4);
        $ligneForfait5 -> setNuitees(3);
        $ligneForfait5 -> setEtape(1);
        $ligneForfait5 -> setKm(50);
        $ligneForfait5 -> setEtat($em->merge($this->getReference('EtatLigne-etat1')));
        $ligneForfait5 -> setFicheFrais($em->merge($this->getReference('FicheFrais-ficheFrais1-3')));
        $ligneForfait5 -> setRegion($em->merge($this->getReference('Region-region3')));
        $ligneForfait5 -> setDateJourDebut(26);
        $ligneForfait5 -> setDateJourFin(27);
        $ligneForfait5 -> setVehicule($em->merge($this->getReference('Vehicule-vehicule3')));

        $ligneForfait6 = new LigneForfait();
        $ligneForfait6 -> setRepasMidi(4);
        $ligneForfait6 -> setNuitees(3);
        $ligneForfait6 -> setEtape(1);
        $ligneForfait6 -> setKm(50);
        $ligneForfait6 -> setEtat($em->merge($this->getReference('EtatLigne-etat2')));
        $ligneForfait6 -> setFicheFrais($em->merge($this->getReference('FicheFrais-ficheFrais1-3')));
        $ligneForfait6 -> setRegion($em->merge($this->getReference('Region-region3')));
        $ligneForfait6 -> setDateJourDebut(01);
        $ligneForfait6 -> setDateJourFin(05);
        $ligneForfait6 -> setVehicule($em->merge($this->getReference('Vehicule-vehicule3')));

        $ligneForfait7 = new LigneForfait();
        $ligneForfait7 -> setRepasMidi(2);
        $ligneForfait7 -> setNuitees(0);
        $ligneForfait7 -> setEtape(0);
        $ligneForfait7 -> setKm(200);
        $ligneForfait7 -> setEtat($em->merge($this->getReference('EtatLigne-etat1')));
        $ligneForfait7 -> setFicheFrais($em->merge($this->getReference('FicheFrais-ficheFrais2-1')));
        $ligneForfait7 -> setRegion($em->merge($this->getReference('Region-region4')));
        $ligneForfait7 -> setDateJourDebut(01);
        $ligneForfait7 -> setDateJourFin(05);
        $ligneForfait7 -> setVehicule($em->merge($this->getReference('Vehicule-vehicule4')));

        $ligneForfait8 = new LigneForfait();
        $ligneForfait8 -> setRepasMidi(2);
        $ligneForfait8 -> setNuitees(0);
        $ligneForfait8 -> setEtape(1);
        $ligneForfait8 -> setKm(280);
        $ligneForfait8 -> setEtat($em->merge($this->getReference('EtatLigne-etat2')));
        $ligneForfait8 -> setFicheFrais($em->merge($this->getReference('FicheFrais-ficheFrais2-1')));
        $ligneForfait8 -> setRegion($em->merge($this->getReference('Region-region11')));
        $ligneForfait8 -> setDateJourDebut(08);
        $ligneForfait8 -> setDateJourFin(09);
        $ligneForfait8 -> setVehicule($em->merge($this->getReference('Vehicule-vehicule4')));

        $ligneForfait9 = new LigneForfait();
        $ligneForfait9 -> setRepasMidi(0);
        $ligneForfait9 -> setNuitees(0);
        $ligneForfait9 -> setEtape(1);
        $ligneForfait9 -> setKm(100);
        $ligneForfait9 -> setEtat($em->merge($this->getReference('EtatLigne-etat1')));
        $ligneForfait9 -> setFicheFrais($em->merge($this->getReference('FicheFrais-ficheFrais2-2')));
        $ligneForfait9 -> setRegion($em->merge($this->getReference('Region-region12')));
        $ligneForfait9 -> setDateJourDebut(08);
        $ligneForfait9 -> setDateJourFin(09);
        $ligneForfait9 -> setVehicule($em->merge($this->getReference('Vehicule-vehicule1')));

        $ligneForfait10 = new LigneForfait();
        $ligneForfait10 -> setRepasMidi(2);
        $ligneForfait10 -> setNuitees(1);
        $ligneForfait10 -> setEtape(1);
        $ligneForfait10 -> setKm(145);
        $ligneForfait10 -> setEtat($em->merge($this->getReference('EtatLigne-etat2')));
        $ligneForfait10 -> setFicheFrais($em->merge($this->getReference('FicheFrais-ficheFrais2-2')));
        $ligneForfait10 -> setRegion($em->merge($this->getReference('Region-region13')));
        $ligneForfait10 -> setDateJourDebut(17);
        $ligneForfait10 -> setDateJourFin(19);
        $ligneForfait10 -> setVehicule($em->merge($this->getReference('Vehicule-vehicule1')));

        $ligneForfait11 = new LigneForfait();
        $ligneForfait11 -> setRepasMidi(1);
        $ligneForfait11 -> setNuitees(0);
        $ligneForfait11 -> setEtape(0);
        $ligneForfait11 -> setKm(100);
        $ligneForfait11 -> setEtat($em->merge($this->getReference('EtatLigne-etat1')));
        $ligneForfait11 -> setFicheFrais($em->merge($this->getReference('FicheFrais-ficheFrais2-3')));
        $ligneForfait11 -> setRegion($em->merge($this->getReference('Region-region14')));
        $ligneForfait11 -> setDateJourDebut(09);
        $ligneForfait11 -> setDateJourFin(10);
        $ligneForfait11 -> setVehicule($em->merge($this->getReference('Vehicule-vehicule3')));

        $ligneForfait12 = new LigneForfait();
        $ligneForfait12 -> setRepasMidi(2);
        $ligneForfait12 -> setNuitees(1);
        $ligneForfait12 -> setEtape(1);
        $ligneForfait12 -> setKm(260);
        $ligneForfait12 -> setEtat($em->merge($this->getReference('EtatLigne-etat2')));
        $ligneForfait12 -> setFicheFrais($em->merge($this->getReference('FicheFrais-ficheFrais2-3')));
        $ligneForfait12 -> setRegion($em->merge($this->getReference('Region-region15')));
        $ligneForfait12 -> setDateJourDebut(22);
        $ligneForfait12 -> setDateJourFin(24);
        $ligneForfait12 -> setVehicule($em->merge($this->getReference('Vehicule-vehicule3')));
        
        $em->persist($ligneForfait1);
        $em->persist($ligneForfait2);
        $em->persist($ligneForfait3);
        $em->persist($ligneForfait4);
        $em->persist($ligneForfait5);
        $em->persist($ligneForfait6);
        $em->persist($ligneForfait7);
        $em->persist($ligneForfait8);
        $em->persist($ligneForfait9);
        $em->persist($ligneForfait10);
        $em->persist($ligneForfait11);
        $em->persist($ligneForfait12);
        $em->flush();
       
        $this->addReference('LigneForfait-ligneForfait1', $ligneForfait1);
        $this->addReference('LigneForfait-ligneForfait2', $ligneForfait2);
        $this->addReference('LigneForfait-ligneForfait3', $ligneForfait3);
        $this->addReference('LigneForfait-ligneForfait4', $ligneForfait4);
        $this->addReference('LigneForfait-ligneForfait5', $ligneForfait5);
        $this->addReference('LigneForfait-ligneForfait6', $ligneForfait6);
        $this->addReference('LigneForfait-ligneForfait7', $ligneForfait7);
        $this->addReference('LigneForfait-ligneForfait8', $ligneForfait8);
        $this->addReference('LigneForfait-ligneForfait9', $ligneForfait9);
        $this->addReference('LigneForfait-ligneForfait10', $ligneForfait10);
        $this->addReference('LigneForfait-ligneForfait11', $ligneForfait11);
        $this->addReference('LigneForfait-ligneForfait12', $ligneForfait12);
        
    }
    public function getOrder()
    {
        return 7; // the order in which fixtures will be loaded
    }
}

