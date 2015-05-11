<?php

namespace projetGSB\projetGsbBundle\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use projetGSB\projetGsbBundle\Entity\LigneHorsForfait;

class LoadLigneHorsForfaitData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
        $ligneHorsForfait1 = new LigneHorsForfait();
        $ligneHorsForfait1 -> setDateJour(12);
        $ligneHorsForfait1 -> setLibelle('Restaurant');
        $ligneHorsForfait1 -> setFicheFrais($em->merge($this->getReference('FicheFrais-ficheFrais1-1')));
        $ligneHorsForfait1 -> setEtat($em->merge($this->getReference('EtatLigne-etat1')));
        $ligneHorsForfait1 -> setMontant(82.50);
                
        $ligneHorsForfait2 = new LigneHorsForfait();
        $ligneHorsForfait2 -> setDateJour(21);
        $ligneHorsForfait2 -> setLibelle('Café');
        $ligneHorsForfait2 -> setFicheFrais($em->merge($this->getReference('FicheFrais-ficheFrais1-1')));
        $ligneHorsForfait2 -> setEtat($em->merge($this->getReference('EtatLigne-etat2')));
        $ligneHorsForfait2 -> setMontant(5.60);
        
        $ligneHorsForfait3 = new LigneHorsForfait();
        $ligneHorsForfait3 -> setDateJour(21);
        $ligneHorsForfait3 -> setLibelle('Bateau sur la Seine');
        $ligneHorsForfait3 -> setFicheFrais($em->merge($this->getReference('FicheFrais-ficheFrais1-2')));
        $ligneHorsForfait3 -> setEtat($em->merge($this->getReference('EtatLigne-etat1')));
        $ligneHorsForfait3 -> setMontant(25);

        $ligneHorsForfait4 = new LigneHorsForfait();
        $ligneHorsForfait4 -> setDateJour(12);
        $ligneHorsForfait4 -> setLibelle('Restaurant');
        $ligneHorsForfait4 -> setFicheFrais($em->merge($this->getReference('FicheFrais-ficheFrais1-2')));
        $ligneHorsForfait4 -> setEtat($em->merge($this->getReference('EtatLigne-etat2')));
        $ligneHorsForfait4 -> setMontant(82.50);
                
        $ligneHorsForfait5 = new LigneHorsForfait();
        $ligneHorsForfait5 -> setDateJour(21);
        $ligneHorsForfait5 -> setLibelle('Café');
        $ligneHorsForfait5 -> setFicheFrais($em->merge($this->getReference('FicheFrais-ficheFrais1-3')));
        $ligneHorsForfait5 -> setEtat($em->merge($this->getReference('EtatLigne-etat1')));
        $ligneHorsForfait5 -> setMontant(5.60);
        
        $ligneHorsForfait6 = new LigneHorsForfait();
        $ligneHorsForfait6 -> setDateJour(21);
        $ligneHorsForfait6 -> setLibelle('Bateau sur la Seine');
        $ligneHorsForfait6 -> setFicheFrais($em->merge($this->getReference('FicheFrais-ficheFrais1-3')));
        $ligneHorsForfait6 -> setEtat($em->merge($this->getReference('EtatLigne-etat2')));
        $ligneHorsForfait6 -> setMontant(25);

        $ligneHorsForfait7 = new LigneHorsForfait();
        $ligneHorsForfait7 -> setDateJour(12);
        $ligneHorsForfait7 -> setLibelle('Restaurant');
        $ligneHorsForfait7 -> setFicheFrais($em->merge($this->getReference('FicheFrais-ficheFrais2-1')));
        $ligneHorsForfait7 -> setEtat($em->merge($this->getReference('EtatLigne-etat1')));
        $ligneHorsForfait7 -> setMontant(82.50);
                
        $ligneHorsForfait8 = new LigneHorsForfait();
        $ligneHorsForfait8 -> setDateJour(21);
        $ligneHorsForfait8 -> setLibelle('Café');
        $ligneHorsForfait8 -> setFicheFrais($em->merge($this->getReference('FicheFrais-ficheFrais2-1')));
        $ligneHorsForfait8 -> setEtat($em->merge($this->getReference('EtatLigne-etat2')));
        $ligneHorsForfait8 -> setMontant(5.60);
        
        $ligneHorsForfait9 = new LigneHorsForfait();
        $ligneHorsForfait9 -> setDateJour(21);
        $ligneHorsForfait9 -> setLibelle('Bateau sur la Seine');
        $ligneHorsForfait9 -> setFicheFrais($em->merge($this->getReference('FicheFrais-ficheFrais2-2')));
        $ligneHorsForfait9 -> setEtat($em->merge($this->getReference('EtatLigne-etat1')));
        $ligneHorsForfait9 -> setMontant(25);

        $ligneHorsForfait10 = new LigneHorsForfait();
        $ligneHorsForfait10 -> setDateJour(12);
        $ligneHorsForfait10 -> setLibelle('Restaurant');
        $ligneHorsForfait10 -> setFicheFrais($em->merge($this->getReference('FicheFrais-ficheFrais2-2')));
        $ligneHorsForfait10 -> setEtat($em->merge($this->getReference('EtatLigne-etat2')));
        $ligneHorsForfait10 -> setMontant(82.50);
                
        $ligneHorsForfait11 = new LigneHorsForfait();
        $ligneHorsForfait11 -> setDateJour(21);
        $ligneHorsForfait11 -> setLibelle('Café');
        $ligneHorsForfait11 -> setFicheFrais($em->merge($this->getReference('FicheFrais-ficheFrais2-3')));
        $ligneHorsForfait11 -> setEtat($em->merge($this->getReference('EtatLigne-etat1')));
        $ligneHorsForfait11 -> setMontant(5.60);
        
        $ligneHorsForfait12 = new LigneHorsForfait();
        $ligneHorsForfait12 -> setDateJour(21);
        $ligneHorsForfait12 -> setLibelle('Bateau sur la Seine');
        $ligneHorsForfait12 -> setFicheFrais($em->merge($this->getReference('FicheFrais-ficheFrais2-3')));
        $ligneHorsForfait12 -> setEtat($em->merge($this->getReference('EtatLigne-etat2')));
        $ligneHorsForfait12 -> setMontant(25);
        
        $em->persist($ligneHorsForfait1);
        $em->persist($ligneHorsForfait2);
        $em->persist($ligneHorsForfait3);
        $em->persist($ligneHorsForfait4);
        $em->persist($ligneHorsForfait5);
        $em->persist($ligneHorsForfait6);
        $em->persist($ligneHorsForfait7);
        $em->persist($ligneHorsForfait8);
        $em->persist($ligneHorsForfait9);
        $em->persist($ligneHorsForfait10);
        $em->persist($ligneHorsForfait11);
        $em->persist($ligneHorsForfait12);
        $em->flush();
       
        $this->addReference('LigneHorsForfait-ligneHorsForfait1', $ligneHorsForfait1);
        $this->addReference('LigneHorsForfait-ligneHorsForfait2', $ligneHorsForfait2);
        $this->addReference('LigneHorsForfait-ligneHorsForfait3', $ligneHorsForfait3);
        $this->addReference('LigneHorsForfait-ligneHorsForfait4', $ligneHorsForfait4);
        $this->addReference('LigneHorsForfait-ligneHorsForfait5', $ligneHorsForfait5);
        $this->addReference('LigneHorsForfait-ligneHorsForfait6', $ligneHorsForfait6);
        $this->addReference('LigneHorsForfait-ligneHorsForfait7', $ligneHorsForfait7);
        $this->addReference('LigneHorsForfait-ligneHorsForfait8', $ligneHorsForfait8);
        $this->addReference('LigneHorsForfait-ligneHorsForfait9', $ligneHorsForfait9);
        $this->addReference('LigneHorsForfait-ligneHorsForfait10', $ligneHorsForfait10);
        $this->addReference('LigneHorsForfait-ligneHorsForfait11', $ligneHorsForfait11);
        $this->addReference('LigneHorsForfait-ligneHorsForfait12', $ligneHorsForfait12);
        
    }
    public function getOrder()
    {
        return 8; // the order in which fixtures will be loaded
    }
}
