<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Sorties;

use App\Form\SortiesCreateForm;
use App\Form\SortiesUpdateForm;

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
    * @Route("/sorties/create", name="sortie_create")
    */
    public function createSortie(Request $request)
    {
        // creates a sorties object and initializes some data for this example
        $sorties = new Sorties();
        $form = $this->createForm(SortiesCreateForm::class, $sorties);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            
            $em->persist($sorties);
            $em->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render('create_sorties.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /** 
    * @Route("/sorties/{id}", name="sortie")
    */
    public function singleSortie($id)
    {
        return $this->render('sorties/singleSortie.html.twig');
    }
    /** 
    * @Route("/sorties/{id}/update", name="sortie_update")
    */
    public function updateSortie(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $sorties = $em->getRepository('App\Entity\Sorties')->find($id);

        if (!$sorties) {
                throw $this->createNotFoundException(
                'There are no articles with the following id: ' . $id
                );
        }
        $form = $this->createForm(SortiesUpdateForm::class, $sorties);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $sorties = $form->getData();
            $em->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render('update_sorties.html.twig', [
            'form' => $form->createView(),
        ]);
        
    }

    /** 
    * @Route("/sorties/{id}/cancel", name="sortie_cancel")
    */
    public function cancelSortie($id)
    {
        $em = $this->getDoctrine()->getManager();
        $sorties = $em->getRepository('App\Entity\Sorties')->find($id);
        if (!$sorties) {
            throw $this->createNotFoundException(
                'There are no articles with the following id: ' . $id
            );
        }

        $sorties->setEtatsIdetat('2');
        $em->flush();

        return $this->redirectToRoute('index');

    }
}