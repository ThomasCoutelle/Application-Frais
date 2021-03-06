<?php

namespace projetGSB\projetGsbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FicheFrais
 *
 * @ORM\Table(name="fiche_frais")
 * @ORM\Entity(repositoryClass="projetGSB\projetGsbBundle\Entity\FicheFraisRepository")
 * 
 */
class FicheFrais
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modification", type="datetime", nullable=true)
     */
    private $datedemodification;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="listeFicheFrais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Utilisateur", referencedColumnName="id")
     * })
     */
    private $Utilisateur;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="EtatFiche")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="etat", referencedColumnName="id")
     * })
     */
    private $etat;
    
     /**
     *
     * @ORM\OneToMany(targetEntity="LigneHorsForfait", mappedBy="ficheFrais", cascade={"persist"})
     *
     */
    private $listeLigneHorsForfait;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="LigneForfait", mappedBy="ficheFrais", cascade={"persist"})
     *
     */
    private $listeLigneForfait;

    public function getId()
    {
        return $this->id;
    }

//    public function getMois()
//    {
//        return $this->mois;
//    }
//
//    public function getAnnee()
//    {
//        return $this->annee;
//    }
    
     public function getDate()
    {
        return $this->date;
    }

    public function getDatedemodification()
    {
        return $this->datedemodification;
    }

    public function getUtilisateur()
    {
        return $this->Utilisateur;
    }

    public function getEtat()
    {
        return $this->etat;
    }

    public function getListeLigneHorsForfait()
    {
        return $this->listeLigneHorsForfait;
    }

    public function getListeLigneForfait()
    {
        return $this->listeLigneForfait;
    }

//    public function setMois($mois)
//    {
//        $this->mois = $mois;
//        return $this;
//    }
//
//    public function setAnnee($annee)
//    {
//        $this->annee = $annee;
//        return $this;
//    }
    
     public function setDate(\DateTime $date)
    {
        $this->date = $date;
        return $this;
    }
    
    public function setDatedemodification(\DateTime $datedemodification)
    {
        $this->datedemodification = $datedemodification;
        return $this;
    }

    public function setUtilisateur($Utilisateur)
    {
        $this->Utilisateur = $Utilisateur;
        return $this;
    }

    public function setEtat($etat)
    {
        $this->etat = $etat;
        return $this;
    }

    public function setListeLigneHorsForfait($listeLigneHorsForfait)
    {
        $this->listeLigneHorsForfait = $listeLigneHorsForfait;
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
        $this->listeLigneHorsForfait = new \Doctrine\Common\Collections\ArrayCollection();
        $this->listeLigneForfait = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add listeLigneHorsForfait
     *
     * @param \projetGSB\projetGsbBundle\Entity\LigneHorsForfait $listeLigneHorsForfait
     * @return FicheFrais
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

    /**
     * Add listeLigneForfait
     *
     * @param \projetGSB\projetGsbBundle\Entity\LigneForfait $listeLigneForfait
     * @return FicheFrais
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
    
    public function __toStringDate()
    {
        return $this->date->format('F Y');
    }
    
    public function getMontantForfaitTotal()
    {
        $total = 0;
        foreach ($this->getListeLigneForfait() as $ligne)
        {
            $total = $total + $ligne->getMontantLigne();
        }
        return $total;
    }
    
    public function getMontantHorsForfaitTotal()
    {
        $total = 0;
        foreach ($this->getListeLigneHorsForfait() as $ligne)
        {
            $total = $total + $ligne->getMontant();
        }
        return $total;
    }
    
    public function getMontantTotal()
    {
        $forfait = $this->getMontantForfaitTotal();
        $horsForfait = $this->getMontantHorsForfaitTotal();
        return $forfait+$horsForfait;
    }

    public function getMontantForfaitTotalValid()
    {
        $total = 0;
        foreach ($this->getListeLigneForfait() as $ligne)
        {
            if ($ligne->getEtat() == 'Validée') {
                $total = $total + $ligne->getMontantLigne();
            }
        }
        return $total;
    }
    
    public function getMontantHorsForfaitTotalValid()
    {
        $total = 0;
        foreach ($this->getListeLigneHorsForfait() as $ligne)
        {
            if ($ligne->getEtat() == 'Validée') {
                $total = $total + $ligne->getMontant();
            }
        }
        return $total;
    }

    public function getMontantTotalValid()
    {
        $forfait = $this->getMontantForfaitTotalValid();
        $horsForfait = $this->getMontantHorsForfaitTotalValid();
        return $forfait+$horsForfait;
    }


    public function getNbJustificatifTotal()
    {
        $nbJustificatif = 0;
        foreach ($this->getListeLigneHorsForfait() as $ligne)
        {
            if($ligne->getJustificatif() !== null)
                $nbJustificatif++;
        }
        return $nbJustificatif;
    }

    public function countFixedPriceLine()
    {
        $count = 0;
        foreach ($this->listeLigneForfait as $i) {
            if ($i->getId()){
                $count++;
            }
        }
        if ($count === 0){
            return false;
        }else{
            return true;
        }
    }

    public function countUnfixedPriceLine()
    {
        $count = 0;
        foreach ($this->listeLigneHorsForfait as $i) {
            if ($i->getId()){
                $count++;
            }
        }
        if ($count === 0){
            return false;
        }else{
            return true;
        }
    }

    public function __toString()
    {
        return 'id:'.$this->id.' date:'.$this->date->format('m Y');
    }
    
//    public function getDateTri()
//    {
//        $arrayLignes = array();
//        $cpt=0;
//        foreach ($this->listeLigneForfait as $ligne)
//        {
//            $arrayLignes = $ligne;
//            $cpt++;
//        }
//        
//        for ($i=0;$i<gmp_pow(count($cpt),2);$i++) 
//        {
//            if ($arrayLignes[$i]->getDateJour()>$arrayLignes[$i+1]->getDateJour())
//            {
//                $temp = $arrayLignes[$i+1] ;
//                $arrayLignes[$i+1] = $arrayLignes[$i];
//                $arrayLignes[$i] = $temp ;
//            }
//        }
//        
//        return $arrayLignes;
//    }
}
