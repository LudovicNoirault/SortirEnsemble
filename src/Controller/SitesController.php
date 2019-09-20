<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Sites;

use App\Form\SitesCreateForm;
use App\Form\SitesUpdateForm;

class SitesController extends AbstractController
{
    // ---------------------- Site -------------------------------

    
    /** 
    * @Route("/sites/", name="sites")
    */
    public function Sites()
    {
        $sites = $this->getDoctrine()->getRepository('App\Entity\Sites')->findAll();
        return $this->render('sites/read_sites.html.twig', array('sites' => $sites));
    }

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
            return $this->redirectToRoute('sites');
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
        $form = $this->createForm(SitesUpdateForm::class, $site);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $ville = $form->getData();
            $em->flush();

            return $this->redirectToRoute('sites');
        }

        return $this->render('sites/update_site.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /** 
    * @Route("/sites/{id}/delete", name="site_delete")
    */
    public function deleteSite($id)
    {
        $em = $this->getDoctrine()->getManager();
        $site = $em->getRepository('App\Entity\Sites')->find($id);

        $em->remove($site);
        $em->flush();

        return $this->redirectToRoute('sites');
    }
}