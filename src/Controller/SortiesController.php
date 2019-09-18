<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Sorties;
use App\Entity\Lieux;
use App\Entity\Sites;
use App\Entity\Villes;

use App\Form\SortiesCreateForm;
use App\Form\SortiesUpdateForm;

use App\Form\VillesCreateForm;
use App\Form\VillesUpdateForm;

use App\Form\SitesCreateForm;
use App\Form\SitesUpdateForm;

use App\Form\LieuxCreateForm;
use App\Form\LieuxUpdateForm;

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

    /** 
    * @Route("/lieux/{id}/update", name="lieux_update")
    */
    public function updateLieu(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $lieu = $em->getRepository('App\Entity\Lieux')->find($id);

        if (!$lieu) {
                throw $this->createNotFoundException(
                'Pas de lieux pour l\'id ' . $id
                );
        }
        $form = $this->createForm(LieuxUpdateForm::class, $lieu);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $lieu = $form->getData();
            $em->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render('lieux/update_lieu.html.twig', [
            'form' => $form->createView(),
        ]);
        
    }

    /** 
    * @Route("/lieux/{id}/delete", name="lieu_delete")
    */
    public function deleteLieu($id)
    {
        $em = $this->getDoctrine()->getManager();
        $lieu = $em->getRepository('App\Entity\Lieux')->find($id);
        if (!$lieu) {
            throw $this->createNotFoundException(
                'Pas de lieu pour l\'id ' . $id
            );
        }

        $em->remove($id);
        $em->flush();

        return $this->redirectToRoute('index');
    }

    // ---------------------- Town -------------------------------

    /** 
    * @Route("/villes/create", name="create_town")
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

        /** 
    * @Route("/villes/{id}/update", name="town_update")
    */
    public function updateTown(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $town = $em->getRepository('App\Entity\Villes')->find($id);

        if (!$town) {
                throw $this->createNotFoundException(
                'Pas de ville pour l\'id ' . $id
                );
        }
        $form = $this->createForm(VillesUpdateForm::class, $town);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $ville = $form->getData();
            $em->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render('villes/update_ville.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /** 
    * @Route("/villes/{id}/delete", name="ville_delete")
    */
    public function deleteVille($id)
    {
        $em = $this->getDoctrine()->getManager();
        $town = $em->getRepository('App\Entity\Villes')->find($id);
        if (!$town) {
            throw $this->createNotFoundException(
                'Pas de Ville pour l\'id ' . $id
            );
        }

        $em->remove($id);
        $em->flush();

        return $this->redirectToRoute('index');
    }

    // ---------------------- Site -------------------------------

    /** 
    * @Route("/sites/create", name="createSite")
    */
    public function CreateSite(Request $request)
    {
        // creates a sorties object and initializes some data for this example
        $site = new Sites();
        $form = $this->createForm(SitesCreateForm::class, $site);

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

    /** 
    * @Route("/sites/{id}/update", name="site_update")
    */
    public function UpdateSite(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $site = $em->getRepository('App\Entity\Sites')->find($id);

        if (!$site) {
                throw $this->createNotFoundException(
                'Pas de site pour l\'id ' . $id
                );
        }
        $form = $this->createForm(SitesUpdateForm::class, $town);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $ville = $form->getData();
            $em->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render('update_site.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /** 
    * @Route("/sites/{id}/delete", name="site_delete")
    */
    public function DeleteSite($id)
    {
        $em = $this->getDoctrine()->getManager();
        $site = $em->getRepository('App\Entity\Sites')->find($id);
        if (!$town) {
            throw $this->createNotFoundException(
                'Pas de site pour l\'id ' . $id
            );
        }

        $em->remove($id);
        $em->flush();

        return $this->redirectToRoute('index');
    }
}