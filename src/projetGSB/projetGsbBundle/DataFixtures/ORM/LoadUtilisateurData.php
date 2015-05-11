<?php

namespace projetGSB\projetGsbBundle\DataFixtures\ORM;

#use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use projetGSB\projetGsbBundle\Entity\Utilisateur;

class LoadUtilisateurData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $em)
    {
        $user1 = new Utilisateur();
        $user1->setNom('Desnot');
        $user1->setPrenom('Pierre');
        $user1->setAdresse('5 rue du php');
        $user1->setCp('69006');
        $user1->setVille('LYON');
        $user1->setDateEmbauche(new \DateTime('2010-05-16'));
        $user1->setLogin('pDesnot');
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user1);
        $user1->setMdp($encoder->encodePassword('passwordDesnot', $user1->getSalt()));
        $user1->setRole ('Visiteur');
        
        $user2 = new Utilisateur();
        $user2->setNom('Eynault-Pascreau');
        $user2->setPrenom('Céline');
        $user2->setAdresse('2 rue Symfony');
        $user2->setCp('69002');
        $user2->setVille('LYON');
        $user2->setDateEmbauche(new \DateTime('2005-12-09'));
        $user2->setLogin('cEynault');
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user2);
        $user2->setMdp($encoder->encodePassword('passwordEynault', $user2->getSalt()));
        $user2->setRole ('Visiteur');

        $accountant1 = new Utilisateur();
        $accountant1->setNom('Cottin');
        $accountant1->setPrenom('Vincenne');
        $accountant1->setAdresse('19 bis avenue de la Doctrine');
        $accountant1->setCp('69002');
        $accountant1->setVille('LYON');
        $accountant1->setDateEmbauche(new \DateTime('2005-12-09'));
        $accountant1->setLogin('vCottin');
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($accountant1);
        $accountant1->setMdp($encoder->encodePassword('passwordCottin', $accountant1->getSalt()));
        $accountant1->setRole ('Comptable');
        
        $admin1 = new Utilisateur();
        $admin1->setNom('ADMIN');
        $admin1->setPrenom('admin');
        $admin1->setAdresse('1 impasse du Python');
        $admin1->setCp('69004');
        $admin1->setVille('LYON');
        $admin1->setDateEmbauche(new \DateTime('2000-01-23'));
        $admin1->setLogin('ADMIN');
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($admin1);
        $admin1->setMdp($encoder->encodePassword('passwordAdmin', $admin1->getSalt()));
        $admin1->setRole ('Admin');
        
        $em->persist($user1);
        $em->persist($user2);
        $em->persist($accountant1);
        $em->persist($admin1);
        $em->flush();
        
        $this->addReference('ustilisateur-user1', $user1);
        $this->addReference('ustilisateur-user2', $user2);
        $this->addReference('ustilisateur-accountant1', $accountant1);
        $this->addReference('ustilisateur-admin1', $admin1);
    }
    
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}

