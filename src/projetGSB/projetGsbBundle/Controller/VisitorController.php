<?php

namespace projetGSB\projetGsbBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use projetGSB\projetGsbBundle\Entity\FicheFrais;
use projetGSB\projetGsbBundle\Entity\LigneForfait;
use projetGSB\projetGsbBundle\Entity\LigneHorsForfait;
use projetGSB\projetGsbBundle\Form\FixedPriceLineForm;
use projetGSB\projetGsbBundle\Form\UnfixedPriceLineForm;

class VisitorController extends Controller
{    
    public function indexAction()
    {
        return $this->createIndexView();
    }
    
    //Crée vue de l'index
    private function createIndexView()
    {
        $fiche = $this->loadCurrent();
        $createFixedPriceLineForm = $this->newFixedPriceLineAction();
        $createUnfixedPriceLineForm = $this->newUnfixedPriceLineAction();
        
        return $this->render('projetGSBprojetGsbBundle:VisitorSide:index.html.twig', [
            'ficheCurrent' => $fiche,
            'FixedPriceLine' => $createFixedPriceLineForm[0],
            'createFixedPriceLineForm' => $createFixedPriceLineForm[1]->createView(),
            'UnfixedPriceLine' => $createUnfixedPriceLineForm[0],
            'createUnfixedPriceLineForm' => $createUnfixedPriceLineForm[1]->createView()
            
            ]);
    }
    
    //Charge la fiche "En cours" ou appel la création d'un nouvelle
    private function loadCurrent()
    {
        $visiteur = $this->getUser();
        $fiche = $this->loadLast($visiteur);
        $db = $this->getDoctrine()->getManager();
        
        if($fiche->getEtat()->getLibelle()== "En cours"){
            $date = date('m Y');
            
            if($fiche->getDate()->format('m Y') != $date)
            {
                $etat = $db->getRepository('projetGSBprojetGsbBundle:EtatFiche')->findOneByLibelle('Cloturée');
                $fiche->setEtat($etat);
                $fiche = $this->createFicheFrais($visiteur);
                $this->removeOldInvoice($visiteur);
                return $fiche;
            }else{
                return $fiche;
            }
           
        }else{
            $fiche = $this->createFicheFrais($visiteur);
            $this->removeOldInvoice($visiteur);
            return $fiche;
        }
    }
    
    //Retourne la dernière fiche créer
    public function loadLast ($visiteur)
    {
        if($visiteur)
        {
            $ficheFrais = $visiteur->getListeFicheFrais();
            $fiche = $ficheFrais[sizeof($ficheFrais)-1];
            
            return $fiche;
        }
    }
    
    //Initialisation d'une fiche frais
    private function createFicheFrais ($visiteur)
    {
        $db = $this->getDoctrine()->getManager();
        $etat = $db->getRepository('projetGSBprojetGsbBundle:EtatFiche')->findOneByLibelle('En cours');
        
        $fiche = new FicheFrais();
        $fiche->setDate(new \DateTime());
        $fiche->setEtat($etat);
        $fiche->setUtilisateur($visiteur);
        
        $db->persist($fiche);
        $db->flush();
        
        return $fiche;
    }

    private function removeOldInvoice($visiteur){
        if ($visiteur){
            $listeFichesFrais = $visiteur->getListeFicheFrais();
            if (sizeof($listeFichesFrais) > 36){
                $db = $this->getDoctrine()->getManager();
                $db->remove($listeFichesFrais[0]);
                $db->flush;
            }
        }
    }

//    ==========================================================================
//                            LIGNE FORFAIT
//    ==========================================================================
    
    //Créer vue formulaire création de ligne forfait
    public function newFixedPriceLineAction()
    {
        $ligneForfait = new LigneForfait();
        $form   = $this->createCreateFixedPriceLineForm($ligneForfait);
        
        return array($ligneForfait, $form);
    }
    
    //Création du formulaire de création de ligne forfait + initialisation
    private function createCreateFixedPriceLineForm(LigneForfait $ligneForfait)
    {
        $etatRefuse = $this->getDoctrine()->getManager()->getRepository('projetGSBprojetGsbBundle:EtatLigne')->findOneByLibelle('Refusée');
        $ligneForfait->setEtat($etatRefuse);
        $fiche = $this->loadLast($this->getUser());
        $ligneForfait->setFicheFrais($fiche);
        $ligneForfait->setEtape(0);
        $ligneForfait->setKm(0);
        $ligneForfait->setNuitees(0);
        $ligneForfait->setRepasMidi(0);
        
        $form = $this->createForm(new FixedPriceLineForm(), $ligneForfait, [
            'action' => $this->generateUrl('projetGSB_visitor_createFixed'),
            'method' => 'POST',
            ]);

        $form->add('submit', 'submit', [
            'label' => 'Créer',
            'attr' => ['class' => 'btn btn-primary  btn-sm']
            ]);
       
        return $form;
    }
    
    //Vérifie ligne forfait saisie et persiste dans la base
    public function createFixedPriceLineAction(Request $request)
    {
        $ligneForfait = new LigneForfait();
        $form = $this->createCreateFixedPriceLineForm($ligneForfait);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $db = $this->getDoctrine()->getManager();
            $fiche = $this->loadLast($this->getUser());
            $fiche->setDatedemodification(new \DateTime());
            $db->persist($ligneForfait, $fiche);
            $db->flush();
        }
        return $this->createIndexView();
    }
    
    //Création de la vue du formulaire de modification et formulaire de suppression ligne forfait
    public function editFixedPriceLineAction($idLigne)
    {
        $db = $this->getDoctrine()->getManager();

        $entity = $db->getRepository('projetGSBprojetGsbBundle:LigneForfait')->find($idLigne);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LigneForfait entity.');
        }

        $editForm = $this->createEditFixedPriceLineForm($entity);
        $deleteForm = $this->createDeleteFixedPriceLineForm($idLigne);

        return $this->render('projetGSBprojetGsbBundle:VisitorSide:updateFixedPriceLine.html.twig', [
            'entity'      => $entity,
            'editFixedPriceLineForm'   => $editForm->createView(),
            'deleteFixedPriceLineForm' => $deleteForm->createView(),
            'ficheCurrent' => $fiche = $this->loadLast($this->getUser())
        ]);
    }

    //Création du formulaire de modification de ligne forfait
    private function createEditFixedPriceLineForm(LigneForfait $entity)
    {
        $form = $this->createForm(new FixedPriceLineForm(), $entity, [
            'action' => $this->generateUrl('projetGSB_visitor_updateFixed', ['idLigne' => $entity->getId()] ),
            'method' => 'PUT',
        ]);

        $form->add('submit', 'submit', [
                'label' => 'Valider',
                'attr' => ['class' => 'btn btn-primary']
            ]);

        return $form;
    }
    
    //Vérifie formualiare et persiste la modification de ligne forfait
    public function updateFixedPriceLineAction(Request $request, $idLigne)
    {
        $db = $this->getDoctrine()->getManager();

        $entity = $db->getRepository('projetGSBprojetGsbBundle:LigneForfait')->find($idLigne);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LigneForfait entity.');
        }

        $editForm = $this->createEditFixedPriceLineForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $fiche = $this->loadLast($this->getUser());
            $fiche->setDatedemodification(new \DateTime());
            $db->flush();

            return $this->createIndexView();
        }
        
        return $this->redirect($this->generateUrl('projetGSB_visitor_editFixed', ['idLigne' => $idLigne]));
    }
    
    // Supprime ligne forfait selectionnnée
    public function deleteFixedPriceLineAction(Request $request, $idLigne)
    {
        $form = $this->createDeleteFixedPriceLineForm($idLigne);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $db = $this->getDoctrine()->getManager();
            $entity = $db->getRepository('projetGSBprojetGsbBundle:LigneForfait')->find($idLigne);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find LigneForfait entity.');
            }
            $fiche = $this->loadLast($this->getUser());
            $fiche->setDatedemodification(new \DateTime());
            $db->remove($entity);
            $db->flush();
        }

        return $this->redirect($this->generateUrl('projetGSB_visitor_index'));
    }

    //Création formulaire de suppression de ligne forfait
    private function createDeleteFixedPriceLineForm($idLigne)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('projetGSB_visitor_deleteFixed', ['idLigne' => $idLigne]))
            ->setMethod('DELETE')
            ->add('submit', 'submit', [
                'label' => 'Supprimer',
                'attr' => ['class' => 'btn btn-danger']
        ])
            ->getForm()
        ;
    }
//    ==========================================================================
//                            LIGNE HORS FORFAIT
//    ==========================================================================
    //Créer vue formulaire ligne hors forfait
    public function newUnfixedPriceLineAction()
    {
        $entity = new LigneHorsForfait();
        $form   = $this->createCreateUnfixedPriceLineForm($entity);
        
        return array($entity, $form);
    }
    
    //Création du formulaire de création de ligne hors forfait
    private function createCreateUnfixedPriceLineForm(LigneHorsForfait $ligneHorsForfait)
    {
        $etat = $this->getDoctrine()->getManager()->getRepository('projetGSBprojetGsbBundle:EtatLigne')->findOneByLibelle('Refusée');
        $ligneHorsForfait->setEtat($etat);
        $fiche = $this->loadLast($this->getUser());
        $ligneHorsForfait->setFicheFrais($fiche);
        
        $form = $this->createForm(new UnfixedPriceLineForm(), $ligneHorsForfait, [
            'action' => $this->generateUrl('projetGSB_visitor_createUnfixed'),
            'method' => 'POST',
            ]);

        $form->add('submit', 'submit', [
            'label' => 'Créer',
            'attr' => ['class' => 'btn btn-primary  btn-sm']
            ]);
       
        return $form;
    }
    
    //Vérifie ligne hors forfait saisie et persiste dans la base
    public function createUnfixedPriceLineAction(Request $request)
    {        
        $ligneHorsForfait = new LigneHorsForfait();
        $form = $this->createCreateUnfixedPriceLineForm($ligneHorsForfait);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $db = $this->getDoctrine()->getManager();
            $fiche = $this->loadLast($this->getUser());
            $fiche->setDatedemodification(new \DateTime());
            $db->persist($ligneHorsForfait, $fiche);
            $db->flush();
        }
        
        return $this->createIndexView();
    }
    
    //Création de la vue du formulaire de modification et formulaire de suppression de ligne hors forfait
    public function editUnfixedPriceLineAction($idLigne)
    {
        $db = $this->getDoctrine()->getManager();

        $entity = $db->getRepository('projetGSBprojetGsbBundle:LigneHorsForfait')->find($idLigne);

        $editForm = $this->createEditUnfixedPriceLineForm($entity);
        $deleteForm = $this->createDeleteUnfixedPriceLineForm($idLigne);

        return $this->render('projetGSBprojetGsbBundle:VisitorSide:updateUnfixedPriceLine.html.twig', [
            'entity'      => $entity,
            'editUnfixedPriceLineForm'   => $editForm->createView(),
            'deleteUnfixedPriceLineForm' => $deleteForm->createView(),
            'ficheCurrent' => $fiche = $this->loadLast($this->getUSer())
        ]);
    }

    //Création du formulaire de modification de ligne hors forfait
    private function createEditUnfixedPriceLineForm(LigneHorsForfait $entity)
    {
        $form = $this->createForm(new UnfixedPriceLineForm(), $entity, [
            'action' => $this->generateUrl('projetGSB_visitor_updateUnfixed', ['idLigne' => $entity->getId()] ),
            'method' => 'PUT',
        ]);

        $form->add('submit', 'submit', [
                'label' => 'Valider',
                'attr' => ['class' => 'btn btn-primary']
            ]);

        return $form;
    }
    
    //Vérifie formualiare et persiste la modification de ligne forfait
    public function updateUnfixedPriceLineAction(Request $request, $idLigne)
    {
        $db = $this->getDoctrine()->getManager();

        $entity = $db->getRepository('projetGSBprojetGsbBundle:LigneHorsForfait')->find($idLigne);

        $editForm = $this->createEditUnfixedPriceLineForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $fiche = $this->loadLast($this->getUser());
            $fiche->setDatedemodification(new \DateTime());
            $db->flush();

            return $this->createIndexView();
        }
        
        return $this->redirect($this->generateUrl('projetGSB_visitor_editUnfixed', ['idLigne' => $idLigne]));
    }
    
    // Supprime ligne hors forfait selectionnnée
    public function deleteUnfixedPriceLineAction(Request $request, $idLigne)
    {
        $form = $this->createDeleteUnfixedPriceLineForm($idLigne);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $db = $this->getDoctrine()->getManager();
            $entity = $db->getRepository('projetGSBprojetGsbBundle:LigneHorsForfait')->find($idLigne);

            $fiche = $this->loadLast($this->getUser());
            $fiche->setDatedemodification(new \DateTime());
            $db->remove($entity);
            $db->flush();
        }

        return $this->redirect($this->generateUrl('projetGSB_visitor_index'));
    }

    //Création formulaire de suppression de ligne hors forfait
    private function createDeleteUnfixedPriceLineForm($idLigne)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('projetGSB_visitor_deleteUnfixed', ['idLigne' => $idLigne]))
            ->setMethod('DELETE')
            ->add('submit', 'submit', [
                'label' => 'Supprimer',
                'attr' => ['class' => 'btn btn-danger']
        ])
            ->getForm()
        ;
    }
}
