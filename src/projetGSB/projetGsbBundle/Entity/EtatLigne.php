<?php

namespace projetGSB\projetGsbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etat_Ligne
 *
 * @ORM\Table(name="etat_ligne")
 * @ORM\Entity(repositoryClass="projetGSB\projetGsbBundle\Entity\EtatLigneRepository")
 */
class EtatLigne
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
     * @ORM\Column(name="libelle", type="string", nullable=false)
     */
    private $libelle;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="LigneForfait", mappedBy="etat", fetch="EXTRA_LAZY")
     *
     */
    private $listeLigneForfait;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="LigneHorsForfait", mappedBy="etat", fetch="EXTRA_LAZY")
     *
     */
    private $listeLigneHorsForfait;
    
    public function getId()
    {
        return $this->id;
    }

    public function getLibelle()
    {
        return $this->libelle;
    }

    public function getListeLigneForfait()
    {
        return $this->listeLigneForfait;
    }
    
     public function getListeLigneHorsForfait()
    {
        return $this->listeLigneHorsForfait;
    }

    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
        return $this;
    }

    public function setListeLigneForfait($listeLigneForfait)
    {
        $this->listeLigneForfait = $listeLigneForfait;
        return $this;
    }

    public function setListeLigneHorsForfait($listeLigneHorsForfait)
    {
        $this->listeLigneHorsForfait = $listeLigneHorsForfait;
        return $this;
    }


    public function __toString()
    {
        return $this->libelle;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->listeLigneForfait = new \Doctrine\Common\Collections\ArrayCollection();
        $this->listeLigneHorsForfait = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add listeLigneForfait
     *
     * @param \projetGSB\projetGsbBundle\Entity\LigneForfait $listeLigneForfait
     * @return EtatLigne
     */
    public function addListeLigneForfait(\projetGSB\projetGsbBundle\Entity\LigneForfait $listeLigneForfait)
    {
        $this->listeLigneForfait[] = $listeLigneForfait;

        return $this;
    }

    /**
     * Remove listeLigneForfait
     *
     * @param \projetGSB\projetGsbBundle\Entity\LigneForfait $listeLigneForfait
     */
    public function removeListeLigneForfait(\projetGSB\projetGsbBundle\Entity\LigneForfait $listeLigneForfait)
    {
        $this->listeLigneForfait->removeElement($listeLigneForfait);
    }

    /**
     * Add listeLigneHorsForfait
     *
     * @param \projetGSB\projetGsbBundle\Entity\LigneHorsForfait $listeLigneHorsForfait
     * @return EtatLigne
     */
    public function addListeLigneHorsForfait(\projetGSB\projetGsbBundle\Entity\LigneHorsForfait $listeLigneHorsForfait)
    {
        $this->listeLigneHorsForfait[] = $listeLigneHorsForfait;

        return $this;
    }

    /**
     * Remove listeLigneHorsForfait
     *
     * @param \projetGSB\projetGsbBundle\Entity\LigneHorsForfait $listeLigneHorsForfait
     */
    public function removeListeLigneHorsForfait(\projetGSB\projetGsbBundle\Entity\LigneHorsForfait $listeLigneHorsForfait)
    {
        $this->listeLigneHorsForfait->removeElement($listeLigneHorsForfait);
    }
}
