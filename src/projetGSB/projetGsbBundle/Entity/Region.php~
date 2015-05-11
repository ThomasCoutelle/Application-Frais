<?php

namespace projetGSB\projetGsbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Region
 *
 * @ORM\Table(name="region")
 * @ORM\Entity(repositoryClass="projetGSB\projetGsbBundle\Entity\RegionRepository")
 */
class Region
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
     * @var float
     *
     * @ORM\Column(name="repas_midi", type="float", precision=5, scale=2, nullable=false)
     */
    private $repasMidi;
    
    /**
     * @var float
     *
     * @ORM\Column(name="nuitee", type="float", precision=5, scale=2, nullable=false)
     */
    private $nuitee;
    
    /**
     * @var float
     *
     * @ORM\Column(name="etape", type="float", precision=5, scale=2, nullable=false)
     */
    private $etape;
    
     /**
     *
     * @ORM\OneToMany(targetEntity="LigneForfait", mappedBy="region", fetch="EXTRA_LAZY")
     *
     */
    private $listeLigneForfait;
    
    public function getId()
    {
        return $this->id;
    }

    public function getLibelle()
    {
        return $this->libelle;
    }

    public function getRepasMidi()
    {
        return $this->repasMidi;
    }

    public function getNuitee()
    {
        return $this->nuitee;
    }

    public function getEtape()
    {
        return $this->etape;
    }

    public function getListeLigneForfait()
    {
        return $this->listeLigneForfait;
    }

    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
        return $this;
    }

    public function setRepasMidi($repasMidi)
    {
        $this->repasMidi = $repasMidi;
        return $this;
    }

    public function setNuitee($nuitee)
    {
        $this->nuitee = $nuitee;
        return $this;
    }

    public function setEtape($etape)
    {
        $this->etape = $etape;
        return $this;
    }

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
     * Add listeLigneForfait
     *
     * @param \projetGSB\projetGsbBundle\Entity\LigneForfait $listeLigneForfait
     * @return Region
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
        return $this->libelle;
    }
}
