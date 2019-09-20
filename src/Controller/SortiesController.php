<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Sorties;
use App\Entity\Inscriptions;
use App\Entity\Etats;

use Symfony\Component\Security\Core\Security;

use DateTime;

use App\Form\SortiesCreateForm;
use App\Form\SortiesUpdateForm;

class SortiesController extends AbstractController
{
    /** 
    * @Route("/", name="index")
    */
    public function index()
    {
        //return $this->render('index.html.twig');
        $sorties = $this->getDoctrine()->getRepository('App\Entity\Sorties')->findAll();
        return $this->render('sorties/read_sorties.html.twig', array('sorties' => $sorties));
    }

    /** 
    * @Route("/sorties", name="sorties")
    */
    public function sorties()
    {
        return $this->redirectToRoute('index');
    }

    /** 
    * @Route("/sorties/create", name="sortie_create")
    */
    public function createSortie(Request $request, Security $security)
    {
        // creates a sorties object and initializes some data for this example
        $sorties = new Sorties();
        $form = $this->createForm(SortiesCreateForm::class, $sorties);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $user = $security->getUser();
            
            $sorties -> setOrganisateur($user -> getUserParticipant());
            
            $etat = $this->getDoctrine()->getRepository('App\Entity\Etats')->findBy(array('idetat'=>1));

            $sorties -> setEtatsetat($etat[0]);

            $em = $this->getDoctrine()->getManager();
            
            $em->persist($sorties);
            $em->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render('sorties/create_sorties.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /** 
    * @Route("/sorties/{id}", name="sortie")
    */
    public function singleSortie($id)
    {
        $sortie = $this->getDoctrine()->getRepository('App\Entity\Sorties')->find($id);

        if (!$sortie) {
            throw $this->createNotFoundException(
            'There are no sorties with the following id: ' . $id);
        }

        return $this->render('sorties/read_one_sorties.html.twig', array('sortie' => $sortie));
    }

    /** 
    * @Route("/sorties/{idSortie}-{idUser}/join", name="sortie_join")
    */
    public function joinSortie($idUser, $idSortie)
    {
        $em = $this->getDoctrine()->getManager();

        $sortie = $this->getDoctrine()->getRepository('App\Entity\Sorties')->find($idSortie);
        $user = $this->getDoctrine()->getRepository('App\Entity\User')->find($idUser);
        $participant = $user -> getUserParticipant();

        $inscription = new Inscriptions();

        $inscription -> setSortiessortie($sortie);
        $inscription -> setDateInscription(new DateTime());
        $inscription -> setParticipantsparticipant($participant);
        
        $em->persist($inscription);
        $em->flush();
        return $this->redirectToRoute('index');
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
                'There are no sorties with the following id: ' . $id
                );
        }
        $form = $this->createForm(SortiesUpdateForm::class, $sorties);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $sorties = $form->getData();
            $em->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render('sorties/update_sorties.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /** 
    * @Route("/sorties/{id}/cancel", name="sortie_cancel")
    */
    public function cancelSortie($id)
    {
        $em = $this->getDoctrine()->getManager();
        $sortie = $em->getRepository('App\Entity\Sorties')->find($id);
        if (!$sortie) {
            throw $this->createNotFoundException(
                'There are no sorties with the following id: ' . $id
            );
        }

        $inscriptions = $em->getRepository('App\Entity\Inscriptions')->findBy(
            ['sortiessortie' => $sortie->getIdSortie()]
        );
        
        foreach ($inscriptions as $key => $value) {
            $em->remove($value);
        }
        $em->remove($sortie);
        $em->flush();

        return $this->redirectToRoute('index');
    }
}