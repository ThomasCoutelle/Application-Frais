<?php

namespace projetGSB\projetGsbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * LigneHorsForfait
 *
 * @ORM\Table(name="ligne_hors_forfait")
 * @ORM\Entity(repositoryClass="projetGSB\projetGsbBundle\Entity\LigneHorsForfaitRepository")
 */
class LigneHorsForfait
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
     *      min=1,
     *      max=31,
     *      minMessage = "Vous ne pouvez saisir un jour inférieur à 1",
     *      maxMessage = "Vous ne pouvez saisir un jour supérieur à 31"      
     *  )
     *
     * @ORM\Column(name="date_jour", type="integer", length=2, nullable=false)
     */
    private $dateJour;

    /**
     * @var float
     * 
     * @Assert\Range(
     *      min=0
     *  )
     *
     * @ORM\Column(name="montant", type="float", precision=6, scale=2, nullable=true)
     */
    private $montant;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=100, nullable=true)
     */
    private $libelle;
    
    /**
     * @var string
     *
     * @ORM\Column(name="motif_refus", type="string", nullable=true)
     */
    private $motifRefus;

    /**
     * @ORM\ManyToOne(targetEntity="FicheFrais", inversedBy="listeLigneHorsForfait", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fiche_frais", referencedColumnName="id", nullable=false)
     * })
     */
    private $ficheFrais;
    
    /**
     * @ORM\ManyToOne(targetEntity="EtatLigne", inversedBy="listeLigneHorsForfait", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="etat", referencedColumnName="id", nullable=false)
     * })
     */
    private $etat;

    /**
     * @var document
     *
     * @ORM\OneToOne(targetEntity="Document", cascade={"persist", "remove"})
     */
    private $justificatif;

    public function getId() {
        return $this->id;
    }

    public function getDateJour() {
        return $this->dateJour;
    }

    public function getMontant() {
        return $this->montant;
    }

    public function getLibelle() {
        return $this->libelle;
    }

    /**
     * @return document
     */
    public function getJustificatif()
    {
        return $this->justificatif;
    }

    public function getMotifRefus() {
        return $this->motifRefus;
    }

    public function getFicheFrais() {
        return $this->ficheFrais;
    }

    public function getEtat() {
        return $this->etat;
    }

    public function setDateJour($dateJour) {
        $this->dateJour = $dateJour;
        return $this;
    }

    public function setMontant($montant) {
        $this->montant = $montant;
        return $this;
    }

    public function setLibelle($libelle) {
        $this->libelle = $libelle;
        return $this;
    }

    /**
     * @param document $justificatif
     */
    public function setJustificatif($justificatif)
    {
        $this->justificatif = $justificatif;
    }

    public function setMotifRefus($motifRefus) {
        $this->motifRefus = $motifRefus;
        return $this;
    }

    public function setFicheFrais($ficheFrais) {
        $this->ficheFrais = $ficheFrais;
        return $this;
    }

    public function setEtat($etat) {
        $this->etat = $etat;
        return $this;
    }

        
    public function getStringJustifier()
    {
        if ($this->justificatif !== null){
            return true;
        }else{
            return false;
        }
    }
    
     public function getStringDateJour()
    {
        if($this->dateJour <10 && $this->dateJour >0)
        {
            return "0".$this->dateJour;
        }else{
            return $this->dateJour;
        }
    }
}
