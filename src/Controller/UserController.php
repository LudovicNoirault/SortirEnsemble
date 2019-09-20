<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Participants;

class UserController extends AbstractController
{
    /**
     * @Route("/users", name="users")
     */
    public function listUser()
    {
        $participants = $this->getDoctrine()->getRepository('App\Entity\Participants')->findAll();
        return $this->render('user/read_all.html.twig', array('participants' => $participants));
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
    public function updateUser($id)
    {
        $user = $this->getDoctrine()->getRepository('App\Entity\Participants')->find($id);
        $form = $this->createForm(UserUpdateForm::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated

            $em = $this->getDoctrine()->getManager();
            
            $em->persist($user);
            $em->flush();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($task);
            // $entityManager->flush();
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
