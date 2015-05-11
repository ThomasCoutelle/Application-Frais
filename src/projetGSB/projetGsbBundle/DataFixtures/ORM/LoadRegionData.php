<?php

namespace projetGSB\projetGsbBundle\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use projetGSB\projetGsbBundle\Entity\Region;

class LoadRegionData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
       $region1 = new Region();
       $region1 -> setLibelle('Alsace');
       $region1 -> setRepasMidi(30);
       $region1 -> setNuitee(82);
       $region1 -> setEtape(106);

       $region2 = new Region();
       $region2 -> setLibelle('Aquitaine');
       $region2 -> setRepasMidi(26);
       $region2 -> setNuitee(81);
       $region2 -> setEtape(109);

       $region3 = new Region();
       $region3 -> setLibelle('Auvergne');
       $region3 -> setRepasMidi(29);
       $region3 -> setNuitee(84);
       $region3 -> setEtape(108);

       $region4 = new Region();
       $region4 -> setLibelle('Basse Normandie');
       $region4 -> setRepasMidi(20);
       $region4 -> setNuitee(84);
       $region4 -> setEtape(113);

       $region5 = new Region();
       $region5 -> setLibelle('Bourgogne');
       $region5 -> setRepasMidi(28);
       $region5 -> setNuitee(83);
       $region5 -> setEtape(108);

       $region6 = new Region();
       $region6 -> setLibelle('Bretagne');
       $region6 -> setRepasMidi(24);
       $region6 -> setNuitee(82);
       $region6 -> setEtape(107);

       $region7 = new Region();
       $region7 -> setLibelle('Centre');
       $region7 -> setRepasMidi(27);
       $region7 -> setNuitee(82);
       $region7 -> setEtape(111);

       $region8 = new Region();
       $region8 -> setLibelle('Champagne');
       $region8 -> setRepasMidi(25);
       $region8 -> setNuitee(79);
       $region8 -> setEtape(114);

       $region9 = new Region();
       $region9 -> setLibelle('Ardenne');
       $region9 -> setRepasMidi(25);
       $region9 -> setNuitee(79);
       $region9 -> setEtape(109);

       $region10 = new Region();
       $region10 -> setLibelle('Corse');
       $region10 -> setRepasMidi(28);
       $region10 -> setNuitee(83);
       $region10 -> setEtape(108);

       $region11 = new Region();
       $region11 -> setLibelle('Franche Compte');
       $region11 -> setRepasMidi(20);
       $region11 -> setNuitee(78);
       $region11 -> setEtape(105);

       $region12 = new Region();
       $region12 -> setLibelle('Haute Normandie');
       $region12 -> setRepasMidi(28);
       $region12 -> setNuitee(79);
       $region12 -> setEtape(113);

       $region13 = new Region();
       $region13 -> setLibelle('Ile de France');
       $region13 -> setRepasMidi(32);
       $region13 -> setNuitee(88);
       $region13 -> setEtape(113);

       $region14 = new Region();
       $region14 -> setLibelle('Languedoc Roussillon');
       $region14 -> setRepasMidi(27);
       $region14 -> setNuitee(79);
       $region14 -> setEtape(109);

       $region15 = new Region();
       $region15 -> setLibelle('Limousin');
       $region15 -> setRepasMidi(21);
       $region15 -> setNuitee(75);
       $region15 -> setEtape(106);

       $region16 = new Region();
       $region16 -> setLibelle('Lorraine');
       $region16 -> setRepasMidi(23);
       $region16 -> setNuitee(73);
       $region16 -> setEtape(106);

       $region17 = new Region();
       $region17 -> setLibelle('Midi Pyrénée');
       $region17 -> setRepasMidi(27);
       $region17 -> setNuitee(8792);
       $region17 -> setEtape(108);

       $region18 = new Region();
       $region18 -> setLibelle('Nord Pas de Calais');
       $region18 -> setRepasMidi(28);
       $region18 -> setNuitee(28);
       $region18 -> setEtape(106);

       $region19 = new Region();
       $region19 -> setLibelle('Provence Alpes Côte d\'Azur');
       $region19 -> setRepasMidi(27);
       $region19 -> setNuitee(82);
       $region19 -> setEtape(105);

       $region20 = new Region();
       $region20 -> setLibelle('Pays de la Loire');
       $region20 -> setRepasMidi(26);
       $region20 -> setNuitee(80);
       $region20 -> setEtape(106);

       $region21 = new Region();
       $region21 -> setLibelle('Picardie');
       $region21 -> setRepasMidi(30);
       $region21 -> setNuitee(81);
       $region21 -> setEtape(110);

       $region22 = new Region();
       $region22 -> setLibelle('Poitou Charente');
       $region22 -> setRepasMidi(29);
       $region22 -> setNuitee(79);
       $region22 -> setEtape(109);

       $region23 = new Region();
       $region23 -> setLibelle('Rhone Alpes');
       $region23 -> setRepasMidi(31);
       $region23 -> setNuitee(85);
       $region23 -> setEtape(115);
       
       $em->persist($region1);
       $em->persist($region2);
       $em->persist($region3);
       $em->persist($region4);
       $em->persist($region5);
       $em->persist($region6);
       $em->persist($region7);
       $em->persist($region8);
       $em->persist($region9);
       $em->persist($region10);
       $em->persist($region11);
       $em->persist($region12);
       $em->persist($region13);
       $em->persist($region14);
       $em->persist($region15);
       $em->persist($region16);
       $em->persist($region17);
       $em->persist($region18);
       $em->persist($region19);
       $em->persist($region20);
       $em->persist($region21);
       $em->persist($region22);
       $em->persist($region23);
       $em->flush();
       
       $this->addReference('Region-region1', $region1);
       $this->addReference('Region-region2', $region2);
       $this->addReference('Region-region3', $region3);
       $this->addReference('Region-region4', $region4);
       $this->addReference('Region-region5', $region5);
       $this->addReference('Region-region6', $region6);
       $this->addReference('Region-region7', $region7);
       $this->addReference('Region-region8', $region8);
       $this->addReference('Region-region9', $region9);
       $this->addReference('Region-region10', $region10);
       $this->addReference('Region-region11', $region11);
       $this->addReference('Region-region12', $region12);
       $this->addReference('Region-region13', $region13);
       $this->addReference('Region-region14', $region14);
       $this->addReference('Region-region15', $region15);
       $this->addReference('Region-region16', $region16);
       $this->addReference('Region-region17', $region17);
       $this->addReference('Region-region18', $region18);
       $this->addReference('Region-region19', $region19);
       $this->addReference('Region-region20', $region20);
       $this->addReference('Region-region21', $region21);
       $this->addReference('Region-region22', $region22);
       $this->addReference('Region-region23', $region23);
       }

       public function getOrder()
       {
              return 4; // the order in which fixtures will be loaded
       }
}



