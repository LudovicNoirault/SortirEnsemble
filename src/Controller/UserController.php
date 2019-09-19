<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Participants;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function listUser()
    {
        return $this->render('user/read_all.html.twig');
    }

        /**
     * @Route("/user/{id}", name="userRead")
     */
    public function readUser($id)
    {
        $user = $this->getDoctrine()->getRepository('App\Entity\Participants')->find($id);

        $userData = [
            $user.getUsername(),
            $user.getPrenom(),
            $user.getNom(),
            $user.getTelephone(),
            $user.getEmail(),
            $user.getSiteAffiliation()
        ];
        
        return $this->render('user/read_single.html.twig', [
            'user' => $userData 
        ]);
    }

        /**
     * @Route("/user/{id}/update", name="userUpdate")
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
}
