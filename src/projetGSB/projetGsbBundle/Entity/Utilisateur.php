<?php

namespace projetGSB\projetGsbBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="projetGSB\projetGsbBundle\Entity\UtilisateurRepository")
 */
class Utilisateur implements UserInterface
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
     * @ORM\Column(name="nom", type="string", length=30, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=30, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=30, nullable=false)
     */
    private $adresse;
    
    /**
     * @var string
     * 
     * @Assert\Length(
     *      min=5,
     *      max=5,
     *      exactMessage= "Le code postale doit être d'une longueur de {{ limit }} chiffres"
     * )
     *
     * @ORM\Column(name="cp", type="string", length=5, nullable=false)
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=30, nullable=false)
     */
    private $ville;

    /**
     * @var date
     *
     * @ORM\Column(name="date_embauche", type="date", nullable=false)
     */
    private $dateEmbauche;

    /**
     * @var string
     * 
     * @Assert\Length(
     *      min=6,
     *      max=20,
     *      minMessage= "L'identifiant doit faire au moins {{ limit }} caractères",
     *      maxMessage= "L'identifiant ne doit pas faire plus de {{ limit }} caractères"
     * )
     * 
     * @ORM\Column(name="login", type="string", length=20, nullable=false)
     */
    private $login;

    /**
     * @var string
     *
     * @Assert\Length(
     *      min=8,
     *      max=20,
     *      minMessage= "Le mot de passe doit faire au moins {{ limit }} caractères",
     *      maxMessage= "Le mot de passe ne doit pas faire plus de {{ limit }} caractères"
     * ) 
     * 
     * @ORM\Column(name="mdp", type="string", nullable=false)
     */
    private $mdp;
    
    /**
     * @var string
     *
     * @Assert\Choice({"Admin", "Visiteur", "Comptable"}, message = "Choisissez Admin, Visiteur ou Comptable.")
     * 
     * @ORM\Column(name="role", type="string", length=20, nullable=false)
     */
    private $role;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="FicheFrais", mappedBy="Utilisateur", cascade={"persist"})
     *
     */
    private $listeFicheFrais;
    
    public function __construct()
    {
        $this->listeFicheFrais= new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function getCp()
    {
        return $this->cp;
    }

    public function getVille()
    {
        return $this->ville;
    }

    public function getDateEmbauche()
    {
        return $this->dateEmbauche;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getMdp()
    {
        return $this->mdp;
    }

    public function getListeFicheFrais()
    {
        return $this->listeFicheFrais;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
        return $this;
    }

    public function setCp($cp)
    {
        $this->cp = $cp;
        return $this;
    }

    public function setVille($ville)
    {
        $this->ville = $ville;
        return $this;
    }

    public function setDateEmbauche(DateTime $dateEmbauche)
    {
        $this->dateEmbauche = $dateEmbauche;
        return $this;
    }

    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
        return $this;
    }

    public function setListeFicheFrais($listeFicheFrais)
    {
        $this->listeFicheFrais = $listeFicheFrais;
        return $this;
    }
    
    public function __toString()
    {
        return $this->nom." ".$this->prenom;
    }

    /**
     * Add listeFicheFrais
     *
     * @param \projetGSB\projetGsbBundle\Entity\FicheFrais $listeFicheFrais
     * @return Utilisateur
     */
    public function addListeFicheFrai(\projetGSB\projetGsbBundle\Entity\FicheFrais $listeFicheFrais)
    {
        $this->listeFicheFrais[] = $listeFicheFrais;

        return $this;
    }

    /**
     * Remove listeFicheFrais
     *
     * @param \projetGSB\projetGsbBundle\Entity\FicheFrais $listeFicheFrais
     */
    public function removeListeFicheFrai(\projetGSB\projetGsbBundle\Entity\FicheFrais $listeFicheFrais)
    {
        $this->listeFicheFrais->removeElement($listeFicheFrais);
    }
    
    public function getRole()
    {
        return $this->role;
    }
    
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    public function getRoles()
    {
        return ['ROLE_'.strtoupper($this->role)];
    }
    
    public function getLoadOldFiches()
    {
         $ficheFrais=[];
         foreach ($this->getListeFicheFrais() as $fiches)
         {
             if($fiches->getEtat()->getLibelle() != 'En cours')
             {
                 array_push($ficheFrais, $fiches);
             }
         }
         return $ficheFrais;
    }
    
    /*
     * Fonctions ajoutées pour connexion
     */
    
    public function getPassword() 
    {
        return $this->mdp;
    }
    
    public function getUsername() {
        return $this->login;
    }
    
     public function getSalt()
    {
        return null;
    }
    public function eraseCredentials()
    {
    }
    public function equals(UserInterface $user)
    {
        return $user->getUsername() == $this->getUsername();
    }
}
