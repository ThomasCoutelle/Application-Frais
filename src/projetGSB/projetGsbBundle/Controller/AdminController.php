<?php

namespace projetGSB\projetGsbBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction ()
    {
        return $this->render('projetGSBprojetGsbBundle:Admin:index.html.twig');
    }
}