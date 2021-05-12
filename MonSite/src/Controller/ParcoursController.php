<?php

namespace App\Controller;

use App\Entity\Doc;
use App\Entity\Parcours;
use App\Entity\Software;
use App\Form\ParcoursType;
use App\Repository\DocRepository;
use App\Repository\ParcoursRepository;
use App\Repository\ProductionRepository;
use App\Repository\SkillRepository;
use App\Repository\SoftwareRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/parcours")
 */
class ParcoursController extends AbstractController
{
    /**
     * @Route("/", name="parcours", methods={"GET"})
     */
    public function index(ParcoursRepository $parcoursRepository, ProductionRepository $productionRepository): Response
    {
        return $this->render('parcours/index.html.twig', [
            'parcours' => $parcoursRepository->findAll(),
            'oclockExercices' => $productionRepository->findExerciceByParcours("O'Clock"),
            'oclockApplications' => $productionRepository->findApplicationByParcours("O'Clock"),
            'cinemaAudiovisuels' => $productionRepository->findAudiovisuelByParcours("3iS")
        ]);
    }

    /**
     * @Route("/new", name="parcours_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $parcour = new Parcours();
        $form = $this->createForm(ParcoursType::class, $parcour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($parcour);
            $entityManager->flush();

            return $this->redirectToRoute('parcours');
        }

        return $this->render('parcours/new.html.twig', [
            'parcour' => $parcour,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="parcours_show", methods={"GET"})
     */
    public function show(Parcours $parcour, ParcoursRepository $parcoursRepo, ProductionRepository $productionRepository, SoftwareRepository $softwareRepository, SkillRepository $skillRepository, DocRepository $docs): Response
    {   
        return $this->render('parcours/show.html.twig', [
            'parcour' => $parcour,
            'softwares' => $softwareRepository->findSoftwareByParcours($parcour->getId()),
            'productions' => $productionRepository->findProductionByParcours($parcour->getId()),
            'skills' => $skillRepository->findSkillByParcours($parcour->getId()),
            'docs' => $docs->findDocByParcours($parcour->getId())
        ]);
    }

    /**
     * @Route("/{id}/edit", name="parcours_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Parcours $parcour): Response
    {
        $form = $this->createForm(ParcoursType::class, $parcour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('parcours');
        }

        return $this->render('parcours/edit.html.twig', [
            'parcour' => $parcour,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="parcours_delete", methods={"POST"})
     */
    public function delete(Request $request, Parcours $parcour): Response
    {
        if ($this->isCsrfTokenValid('delete'.$parcour->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($parcour);
            $entityManager->flush();
        }

        return $this->redirectToRoute('parcours');
    }
}
