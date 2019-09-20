<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Participants;

use App\Form\UserUpdateForm;


class UserController extends AbstractController
{
    /**
     * @Route("/users", name="users")
     */
    public function listUser()
    {
        return $this->render('user/read_all.html.twig');
    }

    /**
     * @Route("/users/{id}", name="userRead")
     */
    public function readUser($id)
    {
        
        $participants = $this->getDoctrine()->getRepository('App\Entity\Participants')->find($id);
        return $this->render('user/read_single.html.twig', array('participants' => $participants));
    }

    /**
     * @Route("/users/{id}/update", name="userUpdate")
     */
    public function updateUser(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $participants = $em->getRepository('App\Entity\Participants')->find($id);

        $form = $this->createForm(UserUpdateForm::class, $participants);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $sorties = $form->getData();
            $em->flush();

            return $this->redirectToRoute('userRead', array('id' => $id));
        }

        return $this->render('user/update_user.html.twig',  [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/users/{id}/status", name="userStatus")
     */
    public function statusUser($id)
    {
        $user = $this->getDoctrine()->getRepository('App\Entity\Participants')->find($id);
        
        if ($user.getActif()){
            $user.setActif(false);
        }
        else{
            $user.setActif(true);
        }

        return $this->redirectToRoute('users');
    }

    /**
     * @Route("/users/{id}/delete", name="userDelete")
     */
    public function deleteUser($id)
    {
        $user = $this->getDoctrine()->getRepository('App\Entity\Participants')->find($id);
        
        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();

        return $this->redirectToRoute('users');
    }
}
