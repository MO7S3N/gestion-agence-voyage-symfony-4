<?php

namespace App\Controller;

use App\Form\MessagesType;
use http\Message;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    /**
     * @Route("/message", name="message")
     */
    public function index(): Response
    {
        return $this->render('message/index.html.twig', [
            'controller_name' => 'MessageController',
        ]);
    }
    /**
     * @Route("/send", name="send")
     */
    public function send(Request $request): Response
    {
        $message = new \App\Entity\Message() ;
        $form = $this->createForm(MessagesType::class,$message) ;

        $form->handleRequest($request) ;

        if ($form->isSubmitted() && $form->isValid()){
            $message->setSender($this->getUser()) ;

            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            $em->flush();

            $this->addFlash("success","Message envoye avec succes.") ;
            return $this->redirectToRoute("message") ;
        }

        return $this->render('message/send.html.twig', [
            "form"=>$form->createView(),
        ]);
    }
    /**
     * @Route("/received", name="received")
     */
    public function received(): Response
    {
        return $this->render('message/received.html.twig');
    }
    /**
     * @Route("/sent", name="sent")
     */
    public function sent(): Response
    {
        return $this->render('message/sent.html.twig');
    }
    /**
     * @Route("/read/{id}", name="read")
     */
    public function read(\App\Entity\Message $message): Response
    {
        $message->setIsRead(true) ;
        $em = $this->getDoctrine()->getManager() ;
        $em->persist($message);
        $em->flush();
        return $this->render('message/received.html.twig',compact("message"));
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete(\App\Entity\Message $message): Response
    {

        $em = $this->getDoctrine()->getManager() ;
        $em->remove($message);
        $em->flush();

        return $this->redirectToRoute("received") ;
    }
}
