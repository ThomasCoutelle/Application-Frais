<?php

namespace projetGSB\projetGsbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vehicule
 *
 * @ORM\Table(name="vehicule")
 * @ORM\Entity(repositoryClass="projetGSB\projetGsbBundle\Entity\VehiculeRepository")
 */
class Vehicule
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
     * @var integer
     *
     * @ORM\Column(name="puissance", type="integer", nullable=false)
     */
    private $puissance;
    
    /**
     * @var string
     *
     * @ORM\Column(name="types", type="string", length=30, nullable=false)
     */
    private $type;

    /**
     * @var float
     *
     * @ORM\Column(name="frais_kilometrique", type="float", precision=3, scale=2, nullable=false)
     */
    private $fraisKm;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="LigneForfait", mappedBy="vehicule", fetch="EXTRA_LAZY")
     *
     */
    private $listeLigneForfait;
    
    public function getId()
    {
        return $this->id;
    }

    public function getPuissance()
    {
        return $this->puissance;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getListeLigneForfait()
    {
        return $this->listeLigneForfait;
    }

    public function setPuissance($puissance)
    {
        $this->puissance = $puissance;
        return $this;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

//    public function setTauxKm($tauxKm)
//    {
//        $this->tauxKm = $tauxKm;
//        return $this;
//    }

    public function setListeLigneForfait($listeLigneForfait)
    {
        $this->listeLigneForfait = $listeLigneForfait;
        return $this;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->listeLigneForfait = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set fraisKm
     *
     * @param float $fraisKm
     * @return Vehicule
     */
    public function setFraisKm($fraisKm)
    {
        $this->fraisKm = $fraisKm;

        return $this;
    }

    /**
     * Get fraisKm
     *
     * @return float 
     */
    public function getFraisKm()
    {
        return $this->fraisKm;
    }

    /**
     * Add listeLigneForfait
     *
     * @param \projetGSB\projetGsbBundle\Entity\LigneForfait $listeLigneForfait
     * @return Vehicule
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
    
    public function __toString()
    {
        return $this->puissance." CV ".$this->type;
    }
}
