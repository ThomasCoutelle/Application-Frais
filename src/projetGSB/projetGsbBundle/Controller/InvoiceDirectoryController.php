<?php

namespace projetGSB\projetGsbBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use projetGSB\projetGsbBundle\Form\ResearchInvoiceVisitorForm;
use projetGSB\projetGsbBundle\Form\ResearchInvoiceAccountantForm;
use projetGSB\projetGsbBundle\Form\ResearchHistoricInvoiceAccountantForm;
use projetGSB\projetGsbBundle\Entity\FicheFrais;

class InvoiceDirectoryController extends Controller
{    
    public function indexAction()
    {
        $role = $this->getUser()->getRole();
        if($role == 'Visiteur')
        {
            return $this->visitorSide($role);           
        }
        else if($role == 'Comptable')
        {
            return $this->accountantSide($role);
        }      
    }

    private function accountantSide($role)
    {
        $db = $this->getDoctrine()->getManager();
        $EtatCloturee = $db->getRepository('projetGSBprojetGsbBundle:EtatFiche')->findOneByLibelle('Cloturée');
        $fiches = $db->getRepository('projetGSBprojetGsbBundle:FicheFrais')->findByEtat($EtatCloturee);
        $form = $this->createResearchInvoiceAccountantForm();

        $request = $this->getRequest();
        if($request->isMethod('POST'))
        {
            $form->bind($request);
            //On vérifie que les valeurs entrées sont correctes
            if($form->isValid())
            {
                $db = $this->getDoctrine()->getManager();
                //On récupère les données entrées dans le formulaire par l'utilisateur
                //$data = $this->getRequest()->request->get('projetgsb_projetgsbbundle_ResearchInvoiceVisitorForm');
                $data = $form->getData();
                //On va récupérer la méthode dans le repository afin de trouver toutes les annonces filtrées par les paramètres du formulaire
                $fiches = $db->getRepository('projetGSBprojetGsbBundle:FicheFrais')->invoiceNameFilter($data, $EtatCloturee);
                //Puis on redirige vers la page de visualisation de cette liste de fiche frais
                return $this->render('projetGSBprojetGsbBundle:InvoiceDirectoryVisitor:index.html.twig', [
                    'filterAccountantForm' => $form->createView(),
                    'fichesConsult' => $fiches,
                    'role' => $role,
                    'info' => null
                ]);
            }
        }

        return $this->render('projetGSBprojetGsbBundle:InvoiceDirectoryVisitor:index.html.twig', [
            'filterAccountantForm' => $form->createView(),
            'fichesConsult' => $fiches,
            'role' => $role,
            'info' => null
        ]);
    }

    private function visitorSide($role)
    {
        $db = $this->getDoctrine()->getManager();

        $form = $this->createResearchInvoiceVisitorForm();
        $etatEnCours = $db->getRepository('projetGSBprojetGsbBundle:EtatFiche')->findOneByLibelle('En cours');
        $idVisiteur = $this->getUser()->getId();
        $query = $db->createQuery('
                                SELECT f
                                FROM projetGSBprojetGsbBundle:FicheFrais f
                                WHERE f.etat != :etat1
                                AND f.Utilisateur = :Utilisateur
                                ')
                    ->setParameter('etat1', $etatEnCours)
                    ->setParameter('Utilisateur', $idVisiteur);
        //$fiches = $this->loadOldFiches();
        $fiches = $query->getResult();

        $request = $this->getRequest();
        if($request->isMethod('POST'))
        {
            $form->bind($request);
            //On vérifie que les valeurs entrées sont correctes
            if($form->isValid())
            {
                $db = $this->getDoctrine()->getManager();
                //On récupère les données entrées dans le formulaire par l'utilisateur
//                $data = $this->getRequest()->request->get('projetgsb_projetgsbbundle_ResearchInvoiceVisitorForm');
                $data = $form->getData();
                //On va récupérer la méthode dans le repository afin de trouver toutes les annonces filtrées par les paramètres du formulaire
                $fiches = $db->getRepository('projetGSBprojetGsbBundle:FicheFrais')->invoiceVisitorFilter($data, $idVisiteur, $etatEnCours);
                //Puis on redirige vers la page de visualisation de cette liste de fiche frais
                return $this->render('projetGSBprojetGsbBundle:InvoiceDirectoryVisitor:index.html.twig', [
                    'filterVisitorForm' => $form->createView(),
                    'fichesConsult' => $fiches,
                    'role' => $role,
                    'info' => null
                ]);
            }
        }
        // À ce stade :
        // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
        // - Soit la requête est de type POST, mais le formulaire n'est pas valide, donc on l'affiche de nouveau
        
        return $this->render('projetGSBprojetGsbBundle:InvoiceDirectoryVisitor:index.html.twig', [
            'filterVisitorForm' => $form->createView(), 
            'fichesConsult' => $fiches,
            'role' => $role,
            'info' => null
        ]);
    }
    
    // Retourne toutes les fiches du visiteur connecté sauf celle en cours
    public function loadOldFiches()
    {
        $idVisiteur = $this->getUser()->getId();
        $db = $this->getDoctrine()->getManager();
        
        if($idVisiteur){
            $visiteur = $db->getRepository('projetGSBprojetGsbBundle:Utilisateur')->find($idVisiteur);
            $fichesFrais = $visiteur->getLoadOldFiches();
            
            return $fichesFrais;
        }
    }

    // Interface de validation des fiches par le comptable
    public function validationAction($idFiche)
    {
         $db = $this->getDoctrine()->getManager();

         if($idFiche){
            $ficheFrais = $db->getRepository('projetGSBprojetGsbBundle:FicheFrais')->find($idFiche);

            return $this->render('projetGSBprojetGsbBundle:AccountantSide:validation.html.twig',[
                'ficheValid' => $ficheFrais
            ]);
         }
    }
    
    // Consultation de la fiche frais selectionné
    public function consultAction($idFiche)
    {
        $db = $this->getDoctrine()->getManager();
        $role = $this->getUser()->getRole();
        
        if($idFiche && $role == 'Visiteur'){
            $ficheFrais = $db->getRepository('projetGSBprojetGsbBundle:FicheFrais')->find($idFiche);
            return $this->render('projetGSBprojetGsbBundle:VisitorSide:consult.html.twig', [
            'ficheConsult' => $ficheFrais,
        ]);
        }
        if($idFiche && $role == 'Comptable'){
            $ficheFrais = $db->getRepository('projetGSBprojetGsbBundle:FicheFrais')->find($idFiche);
            return $this->render('projetGSBprojetGsbBundle:AccountantSide:consult.html.twig', [
            'ficheConsult' => $ficheFrais,
        ]);
        }
    }

    //Consultation de toutes les fiches déja validé par le comptable (inclus 'Rembourséé')
    public function historicAction()
    {
        $db = $this->getDoctrine()->getManager();
        $etatValide = $db->getRepository('projetGSBprojetGsbBundle:EtatFiche')->findByLibelle('Validée');
        $etatRembourse = $db->getRepository('projetGSBprojetGsbBundle:EtatFiche')->findByLibelle('Remboursée');
        $query = $db->createQuery('
                                SELECT f
                                FROM projetGSBprojetGsbBundle:FicheFrais f
                                WHERE f.etat = :etat1 OR f.etat = :etat2
                                ')
                            ->setParameter('etat1', $etatValide)
                            ->setParameter('etat2', $etatRembourse);
        $fichesFrais = $query->getResult();
        $form = $this->createResearchHistoricInvoiceAccountantForm();

        $request = $this->getRequest();
        if($request->isMethod('POST'))
        {
            $form->bind($request);
            //On vérifie que les valeurs entrées sont correctes
            if($form->isValid())
            {
                $db = $this->getDoctrine()->getManager();
                //On récupère les données entrées dans le formulaire par l'utilisateur
                //$data = $this->getRequest()->request->get('projetgsb_projetgsbbundle_ResearchInvoiceVisitorForm');
                $data = $form->getData();
                //On va récupérer la méthode dans le repository afin de trouver toutes les annonces filtrées par les paramètres du formulaire
                $fichesFrais = $db->getRepository('projetGSBprojetGsbBundle:FicheFrais')->completeFormFilter($data, $etatValide, $etatRembourse);
                //Puis on redirige vers la page de visualisation de cette liste de fiche frais
                return $this->render('projetGSBprojetGsbBundle:InvoiceDirectoryVisitor:index.html.twig', [
                    'filterAccountantHistoricForm' => $form->createView(),
                    'fichesConsult' => $fichesFrais,
                    'role' => 'ComptableConsult'
                ]);
            }
        }
        return $this->render('projetGSBprojetGsbBundle:InvoiceDirectoryVisitor:index.html.twig', [
            'filterAccountantHistoricForm' => $form->createView(),
            'fichesConsult' => $fichesFrais,
            'role' => 'ComptableConsult'
        ]);
    }
    
    //Création du formulaire de recherche de fiche frais du visiteur
    private function createResearchInvoiceVisitorForm()
    {        
        $form = $this->createForm(new ResearchInvoiceVisitorForm());

        $form->add('submit', 'submit', [
            'label' => 'Chercher',
            'attr' => ['class' => 'btn btn-primary']
            ]);
       
        return $form;
    }

    //Création du formulaire de recherche de fiche frais du comptable
    private function createResearchInvoiceAccountantForm()
    {        
        $form = $this->createForm(new ResearchInvoiceAccountantForm());

        $form->add('submit', 'submit', [
            'label' => 'Chercher',
            'attr' => ['class' => 'btn btn-primary']
            ]);
       
        return $form;
    }

    //Création du formulaire de recherche de fiche frais de l'annuaire du comptable
    private function createResearchHistoricInvoiceAccountantForm()
    {        
        $form = $this->createForm(new ResearchHistoricInvoiceAccountantForm());

        $form->add('submit', 'submit', [
            'label' => 'Chercher',
            'attr' => ['class' => 'btn btn-primary']
            ]);
       
        return $form;
    }
}


