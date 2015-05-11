<?php

namespace projetGSB\projetGsbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * LigneForfait
 *
 * @ORM\Table(name="ligne_forfait")
 * @ORM\Entity(repositoryClass="projetGSB\projetGsbBundle\Entity\LigneForfaitRepository")
 */
class LigneForfait
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
     * @Assert\Range(
     *      min=0
     *  )
     * 
     * @ORM\Column(name="repas_midi", type="integer", nullable=false)
     */
    private $repasMidi;
    
    /**
     * @var integer
     *
     * @Assert\Range(
     *      min=0
     * )
     * 
     * @ORM\Column(name="nuitees", type="integer", nullable=false)
     */
    private $nuitees;
    
    /**
     * @var integer
     * 
     * @Assert\Range(
     *      min=0
     *  ) 
     *
     * @ORM\Column(name="etape", type="integer", nullable=false)
     */
    private $etape;
    
    /**
     * @var integer
     * 
     * @Assert\Range(
     *      min=0
     *  )
     * 
     * @ORM\Column(name="km", type="integer", nullable=false)
     */
    private $km;
    
    /**
     * @var integer
     * 
     * @Assert\Range(
     *      min=1,
     *      max=31,
     *      minMessage = "Vous ne pouvez saisir un jour inférieur à 1",
     *      maxMessage = "Vous ne pouvez saisir un jour supérieur à 31"
     *  )
     *
     * @ORM\Column(name="date_jour_debut", type="integer", length=2, nullable=false)
     */
    private $dateJourDebut;
    
    /**
     * @var integer
     * 
     * @Assert\Range(
     *      min=1,
     *      max=31,
     *      minMessage = "Vous ne pouvez saisir un jour inférieur à 1",
     *      maxMessage = "Vous ne pouvez saisir un jour supérieur à 31"
     *  )
     *
     * @ORM\Column(name="date_jour_fin", type="integer", length=2, nullable=false)
     */
    private $dateJourFin;
    
    /**
     * @var string
     *
     * @ORM\Column(name="motif_refus", type="string", nullable=true)
     */
    private $motifRefus;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Region", inversedBy="listeLigneForfait")
     * @ORM\JoinColumn(name="region", referencedColumnName="id", nullable=false)
     * 
     */
    private $region;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Vehicule", inversedBy="listeLigneForfait", cascade={"persist"})
     * @ORM\JoinColumn(name="vehicule", referencedColumnName="id", nullable=false)
     * 
     */
    private $vehicule;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="EtatLigne", inversedBy="listeLigneForfait", cascade={"persist"})
     * @ORM\JoinColumn(name="etat", referencedColumnName="id", nullable=false)
     * 
     */
    private $etat;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="FicheFrais", inversedBy="listeLigneForfait", cascade={"persist"})
     * @ORM\JoinColumn(name="fiche_frais", referencedColumnName="id", nullable=false)
     * 
     */
    private $ficheFrais;
        
    public function getId() {
        return $this->id;
    }

    public function getRepasMidi() {
        return $this->repasMidi;
    }

    public function getNuitees() {
        return $this->nuitees;
    }

    public function getEtape() {
        return $this->etape;
    }

    public function getKm() {
        return $this->km;
    }

    public function getDateJourDebut() {
        return $this->dateJourDebut;
    }

    public function getDateJourFin() {
        return $this->dateJourFin;
    }

    public function getMotifRefus() {
        return $this->motifRefus;
    }

    public function getRegion() {
        return $this->region;
    }

    public function getVehicule() {
        return $this->vehicule;
    }

    public function getEtat() {
        return $this->etat;
    }

    public function getFicheFrais() {
        return $this->ficheFrais;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setRepasMidi($repasMidi) {
        $this->repasMidi = $repasMidi;
        return $this;
    }

    public function setNuitees($nuitees) {
        $this->nuitees = $nuitees;
        return $this;
    }

    public function setEtape($etape) {
        $this->etape = $etape;
        return $this;
    }

    public function setKm($km) {
        $this->km = $km;
        return $this;
    }

    public function setDateJourDebut($dateJourDebut) {
        $this->dateJourDebut = $dateJourDebut;
        return $this;
    }

    public function setDateJourFin($dateJourFin) {
        $this->dateJourFin = $dateJourFin;
        return $this;
    }

    public function setMotifRefus($motifRefus) {
        $this->motifRefus = $motifRefus;
        return $this;
    }

    public function setRegion($region) {
        $this->region = $region;
        return $this;
    }

    public function setVehicule($vehicule) {
        $this->vehicule = $vehicule;
        return $this;
    }

    public function setEtat($etat) {
        $this->etat = $etat;
        return $this;
    }

    public function setFicheFrais($ficheFrais) {
        $this->ficheFrais = $ficheFrais;
        return $this;
    }

    
        
    public function getMontantLigne()
    {
        return $this->region->getRepasMidi()*$this->repasMidi + $this->region->getNuitee()*$this->nuitees + $this->region->getEtape()*$this->etape + $this->vehicule->getFraisKm()*$this->km;
    }
    
    public function getStringDateJourDebut()
    {
        if($this->dateJourDebut <10 && $this->dateJourDebut >0)
        {
            return "0".$this->dateJourDebut;
        }else{
            return $this->dateJourDebut;
        }
    }
    
    public function getStringDateJourFin()
    {
        if($this->dateJourFin <10 && $this->dateJourFin>0)
        {
            return "0".$this->dateJourFin;
        }else{
            return $this->dateJourFin;
        }
    }
}
