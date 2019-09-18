<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Sorties;
use App\Entity\Lieux;

use App\Form\LieuxCreateForm;
use App\Form\LieuxUpdateForm;

class LieuxController extends AbstractController
{
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

}