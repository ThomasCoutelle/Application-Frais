<?php

namespace projetGSB\projetGsbBundle\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use projetGSB\projetGsbBundle\Entity\FicheFrais;

class LoadFicheFraisData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
        $ficheFrais1 = new FicheFrais();
        $ficheFrais1 -> setDate(new \DateTime('2014-10-01'));
        $ficheFrais1 -> setUtilisateur($em->merge($this->getReference('ustilisateur-user1')));
        $ficheFrais1 -> setEtat($em->merge($this->getReference('EtatFiche-etat4')));
                
        $ficheFrais2 = new FicheFrais();
        $ficheFrais2 -> setDate(new \DateTime('2014-11-01'));
        $ficheFrais2 -> setUtilisateur($em->merge($this->getReference('ustilisateur-user1')));
        $ficheFrais2 -> setEtat($em->merge($this->getReference('EtatFiche-etat3')));
        
        $ficheFrais3 = new FicheFrais();
        $ficheFrais3 -> setDate(new \DateTime('2015-02-01'));
        $ficheFrais3 -> setUtilisateur($em->merge($this->getReference('ustilisateur-user1')));
        $ficheFrais3 -> setEtat($em->merge($this->getReference('EtatFiche-etat2')));

        $ficheFrais4 = new FicheFrais();
        $ficheFrais4 -> setDate(new \DateTime('2014-10-01'));
        $ficheFrais4 -> setUtilisateur($em->merge($this->getReference('ustilisateur-user2')));
        $ficheFrais4 -> setEtat($em->merge($this->getReference('EtatFiche-etat4')));
                
        $ficheFrais5 = new FicheFrais();
        $ficheFrais5 -> setDate(new \DateTime('2014-11-01'));
        $ficheFrais5 -> setUtilisateur($em->merge($this->getReference('ustilisateur-user2')));
        $ficheFrais5 -> setEtat($em->merge($this->getReference('EtatFiche-etat3')));
        
        $ficheFrais6 = new FicheFrais();
        $ficheFrais6 -> setDate(new \DateTime('2015-02-01'));
        $ficheFrais6 -> setUtilisateur($em->merge($this->getReference('ustilisateur-user2')));
        $ficheFrais6 -> setEtat($em->merge($this->getReference('EtatFiche-etat2')));
        
        $em->persist($ficheFrais1);
        $em->persist($ficheFrais2);
        $em->persist($ficheFrais3);
        $em->persist($ficheFrais4);
        $em->persist($ficheFrais5);
        $em->persist($ficheFrais6);
        $em->flush();
       
        $this->addReference('FicheFrais-ficheFrais1-1', $ficheFrais1);
        $this->addReference('FicheFrais-ficheFrais1-2', $ficheFrais2);
        $this->addReference('FicheFrais-ficheFrais1-3', $ficheFrais3);
        $this->addReference('FicheFrais-ficheFrais2-1', $ficheFrais4);
        $this->addReference('FicheFrais-ficheFrais2-2', $ficheFrais5);
        $this->addReference('FicheFrais-ficheFrais2-3', $ficheFrais6);
        
    }
    public function getOrder()
    {
        return 6; // the order in which fixtures will be loaded
    }
}
