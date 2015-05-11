<?php

namespace projetGSB\projetGsbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EtatFiche
 *
 * @ORM\Table(name="etat_fiche")
 * @ORM\Entity(repositoryClass="projetGSB\projetGsbBundle\Entity\EtatFicheRepository")
 */
class EtatFiche
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=30, nullable=true)
     */
    private $libelle;

    public function getId()
    {
        return $this->id;
    }

    public function getLibelle()
    {
        return $this->libelle;
    }
    
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
        return $this;
    }

   public function __toString()
    {
        return $this->libelle;
    }


}
