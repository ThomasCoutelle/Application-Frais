<?php

namespace projetGSB\projetGsbBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $request = $this->getRequest();
        $session = $request->getSession();
        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }
        return $this->render('projetGSBprojetGsbBundle:Default:index.html.twig', array(
            // last username entered by the user
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error' => $error,
        ));
    }
    
    public function gestionConnexionAction()
    {
        $user = $this->getUser();
        
        if($user != null)
        {
            $roles = $user->getRoles();
            
            if(in_array("ROLE_ADMIN", $roles))
            {
                return $this->redirect($this->generateUrl('projetGSB_admin_index'));
            }
            
            elseif(in_array("ROLE_COMPTABLE", $roles))
            {
                return $this->redirect($this->generateUrl('projetGSB_accountant_index'));
            }
            
            elseif(in_array("ROLE_VISITEUR", $roles))
            {
                return $this->redirect($this->generateUrl('projetGSB_visitor_index'));
            }
        }
    }
}
