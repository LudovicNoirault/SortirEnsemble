<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Sorties;
use App\Entity\Lieux;
use App\Entity\Sites;
use App\Entity\Villes;

use App\Form\SortiesForm;
use App\Form\LieuxForm;
use App\Form\SitesForm;
use App\Form\VillesForm;

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
        $form = $this->createForm(SortiesForm::class, $sorties);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated

            $em = $this->getDoctrine()->getManager();
            
            $em->persist($sorties);
            $em->flush();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($task);
            // $entityManager->flush();
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

    // ---------------------- Lieux -------------------------------

      /** 
    * @Route("/lieux/create", name="createLieu")
    */
    public function CreateLieu(Request $request)
    {
        // creates a sorties object and initializes some data for this example
        $lieu = new Lieux();
        $form = $this->createForm(LieuxForm::class, $lieu);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated

            $em = $this->getDoctrine()->getManager();
            
            $em->persist($lieu);
            $em->flush();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($task);
            // $entityManager->flush();
            return $this->redirectToRoute('index');
        }
    
        return $this->render('lieux/create_lieu.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // ---------------------- Town -------------------------------

    /** 
    * @Route("/villes/create", name="createTown")
    */
    public function CreateTown(Request $request)
    {
        // creates a sorties object and initializes some data for this example
        $town = new Villes();
        $form = $this->createForm(VillesForm::class, $town);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated

            $em = $this->getDoctrine()->getManager();
            
            $em->persist($town);
            $em->flush();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($task);
            // $entityManager->flush();
            return $this->redirectToRoute('index');
        }
    
        return $this->render('villes/create_ville.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // ---------------------- Site -------------------------------

    /** 
    * @Route("/sites/create", name="createSite")
    */
    public function CreateSite(Request $request)
    {
        // creates a sorties object and initializes some data for this example
        $site = new Sites();
        $form = $this->createForm(SitesForm::class, $site);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated

            $em = $this->getDoctrine()->getManager();
            
            $em->persist($site);
            $em->flush();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($task);
            // $entityManager->flush();
            return $this->redirectToRoute('index');
        }
    
        return $this->render('sites/create_site.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
