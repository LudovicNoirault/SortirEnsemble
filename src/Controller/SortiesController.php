<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Sorties;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use App\Form\SortiesForm;



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
    public function createSortie()
    {
        $request = new Request();
        return $this->new($request);
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

    public function new(Request $request)
    {
        // creates a sorties object and initializes some data for this example
        $sorties = new Sorties();
        $form = $this->createForm(SortiesForm::class, $sorties);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $sorties = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($task);
            // $entityManager->flush();

        return $this->redirectToRoute('task_success');
        }

        return $this->render('create_sorties.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
