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
    * @Route("/sorties/{id}", name="sortie")
    */
    public function singleSortie($id)
    {
        return $this->render('sorties/singleSortie.html.twig');
    }

    /** 
    * @Route("/sorties/creation", name="sortie_create")
    */
    public function createSortie()
    {
        return $this->render('sorties/createSortie.html.twig');
    }

    /** 
    * @Route("/sorties/{id}/update", name="sortie_update")
    */
    public function updateSortie($id)
    {
        return $this->render('sorties/updateSortie.html.twig');
    }

    /** 
    * @Route("/sorties/{id}/cancel", name="sortie_cancel")
    */
    public function cancelSortie($id)
    {
        return $this->render('sorties/cancelSortie.html.twig');
    }

    /** 
    * @Route("/villes", name="town")
    */
    public function town()
    {
        return $this->render('sorties/villes.html.twig');
    }

    /** 
    * @Route("/sites", name="sites")
    */
    public function sites()
    {
        return $this->render('sites.html.twig');
    }
}
