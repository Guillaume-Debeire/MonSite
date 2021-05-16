<?php

namespace App\Controller;

use App\Entity\Audiovisuel;
use App\Form\AudiovisuelType;
use App\Repository\AudiovisuelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/audiovisuel")
 */
class AudiovisuelController extends AbstractController
{
    /**
     * @Route("/", name="audiovisuel_index", methods={"GET"})
     */
    public function index(AudiovisuelRepository $audiovisuelRepository): Response
    {
        return $this->render('audiovisuel/index.html.twig', [
            'audiovisuels' => $audiovisuelRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="audiovisuel_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $audiovisuel = new Audiovisuel();
        $form = $this->createForm(AudiovisuelType::class, $audiovisuel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($audiovisuel);
            $entityManager->flush();

            return $this->redirectToRoute('audiovisuel_index');
        }

        return $this->render('audiovisuel/new.html.twig', [
            'audiovisuel' => $audiovisuel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="audiovisuel_show", methods={"GET"})
     */
    public function show(Audiovisuel $audiovisuel): Response
    {
        return $this->render('audiovisuel/show.html.twig', [
            'audiovisuel' => $audiovisuel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="audiovisuel_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Audiovisuel $audiovisuel): Response
    {
        $form = $this->createForm(AudiovisuelType::class, $audiovisuel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('audiovisuel_index');
        }

        return $this->render('audiovisuel/edit.html.twig', [
            'audiovisuel' => $audiovisuel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/delete", name="audiovisuel_delete", methods={"POST"})
     */
    public function delete(Request $request, Audiovisuel $audiovisuel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$audiovisuel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($audiovisuel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('audiovisuel_index');
    }
}
