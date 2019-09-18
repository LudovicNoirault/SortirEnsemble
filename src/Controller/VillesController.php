<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Villes;

use App\Form\VillesCreateForm;
use App\Form\VillesUpdateForm;

class VillesController extends AbstractController
{
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
}