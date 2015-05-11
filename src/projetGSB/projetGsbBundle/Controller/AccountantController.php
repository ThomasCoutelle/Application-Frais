<?php

namespace projetGSB\projetGsbBundle\Controller;

use projetGSB\projetGsbBundle\Entity\LigneForfait;
use projetGSB\projetGsbBundle\Entity\LigneHorsForfait;
use projetGSB\projetGsbBundle\Form\ValidationForm;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AccountantController extends Controller
{
    public function validationDisplayAction(Request $request, $idFiche)
    {
        $db = $this->getDoctrine()->getManager();
        $ficheFrais = $db->getRepository('projetGSBprojetGsbBundle:FicheFrais')->find($idFiche);

        $validationForm = $this->createForm(new ValidationForm(), $ficheFrais);

        if ($request->isMethod('POST')) {
            $validationForm->handleRequest($request);
            if ($validationForm->isValid()) {
                $db->flush();
            }
        }

        return $this->render('projetGSBprojetGsbBundle:AccountantSide:validation.html.twig', [
            'ficheValid' => $ficheFrais,
            'validationForm' => $validationForm->createView(),
        ]);
    }

   /* public function toggleValidationAction(Request $request, $idLigne, $type)
    {
        $db = $this->getDoctrine()->getManager();

        if ($type == 'LF') {
            $ligne = $db->getRepository('projetGSBprojetGsbBundle:LigneForfait')->find($idLigne);
        } else {
            $ligne = $db->getRepository('projetGSBprojetGsbBundle:LigneHorsForfait')->find($idLigne);
        }

        if ($ligne->getEtat() == 'Validée') {
            $etatRefusee = $db->getRepository('projetGSBprojetGsbBundle:EtatLigne')->findOneByLibelle('Refusée');
            $ligne->setEtat($etatRefusee);
        } else {
            $etatValidee = $db->getRepository('projetGSBprojetGsbBundle:EtatLigne')->findOneByLibelle('Validée');
            $ligne->setEtat($etatValidee);
        }
        $db->flush();
        return $this->redirect($this->generateUrl('projetGSB_accountant_validationDisplay',['idFiche' => $ligne->getFicheFrais()->getId()]));
    }*/

    public function fenceAllInvoiceAction()
    {
        $db = $this->getDoctrine()->getManager();
        $etatEnCours = $db->getRepository('projetGSBprojetGsbBundle:EtatFiche')->findOneByLibelle('En cours');
        $etatCloture = $db->getRepository('projetGSBprojetGsbBundle:EtatFiche')->findOneByLibelle('Cloturée');

        $fichesFrais = $db->getRepository('projetGSBprojetGsbBundle:FicheFrais')->findByEtat($etatEnCours);
        if ($fichesFrais){
            foreach($fichesFrais as $i)
            {
                if ($i->getDate()->format('m Y') > date('m Y')){
                    $i->setEtat($etatCloture);
                }
            }
            $db->flush();
        }
        return $this->redirect($this->generateUrl('projetGSB_accountant_index'));
    }

    public function validateAllInvoiceAction()
    {
        $db = $this->getDoctrine()->getManager();
        $etatCloture = $db->getRepository('projetGSBprojetGsbBundle:EtatFiche')->findOneByLibelle('Cloturée');
        $etatValide = $db->getRepository('projetGSBprojetGsbBundle:EtatFiche')->findOneByLibelle('Validée');
        $fichesFrais = $db->getRepository('projetGSBprojetGsbBundle:FicheFrais')->findByEtat($etatCloture);
        if ($fichesFrais){
            foreach($fichesFrais as $i)
            {
                $i->setEtat($etatValide);
            }
            $db->flush();
        }
        return $this->redirect($this->generateUrl('projetGSB_accountant_index'));
    }

    public function validateOneInvoiceAction($idFiche)
    {
        $db = $this->getDoctrine()->getManager();
        $etatValide = $db->getRepository('projetGSBprojetGsbBundle:EtatFiche')->findOneByLibelle('Validée');
        $ficheFrais = $db->getRepository('projetGSBprojetGsbBundle:FicheFrais')->find($idFiche);
        $ficheFrais->setEtat($etatValide);
        $db->flush();

        $info = $this->info($ficheFrais);

        return $this->redirect($this->generateUrl('projetGSB_accountant_index', ['info' => $info]));
    }

   /* private function info($ficheFrais)
    {
        if($ficheFrais->getMontantTotalValid() != $ficheFrais->getMontantTotal()){
            $info = 'Votre fiche du mois de'.$ficheFrais->getDate('m').' n\'a pas entièrement été Validée';
        }

        return $info;
    }*/
}