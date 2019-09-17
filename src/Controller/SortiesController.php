<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SortiesController extends AbstractController
{
    /** 
    * @Route("/index", name="index")
    */
    public function index()
    {
        return $this->render('index.html.twig');
    }

    /** 
    * @Route("/profile", name="profile")
    */
    public function profile()
    {
        return $this->render('profile.html.twig');
    }

    /** 
    * @Route("/sorties/{id}", name="sortie")
    */
    public function singleSortie($id)
    {
        return $this->render('singleSortie.html.twig');
    }

    /** 
    * @Route("/sorties/creation", name="sortie_create")
    */
    public function createSortie()
    {
        return $this->render('createSortie.html.twig');
    }

    /** 
    * @Route("/sorties/{id}/update", name="sortie_update")
    */
    public function updateSortie($id)
    {
        return $this->render('updateSortie.html.twig');
    }

    /** 
    * @Route("/sorties/{id}/cancel", name="sortie_cancel")
    */
    public function cancelSortie($id)
    {
        return $this->render('cancelSortie.html.twig');
    }

    /** 
    * @Route("/villes", name="town")
    */
    public function town()
    {
        return $this->render('villes.html.twig');
    }

    /** 
    * @Route("/sites", name="sites")
    */
    public function sites()
    {
        return $this->render('sites.html.twig');
    }
}
