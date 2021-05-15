<?php

namespace App\Controller;

use App\Entity\Picture;
use App\Form\PictureType;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PictureController extends AbstractController
{
    /**
     * @Route("/picture", name="picture")
     */
    public function index(): Response
    {
        return $this->render('picture/index.html.twig', [
            'controller_name' => 'PictureController',
        ]);
    }

    /**
     * @Route("/picture/new", name="picture_new")
     */
    public function new(Request $request, FileUploader $fileUploader): Response
    {
        $picture = new Picture();
        $form = $this->createForm(PictureType::class, $picture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $name = $form->get('name')->getData();
            $image = $form->get('picture')->getData();
            $pictureFolder = 'assets/images/';
            $fileUploader->moveImage($image, $pictureFolder, $name);
            $picturePath = $pictureFolder . $name;
            $picture->setPath($picturePath);
            $entityManager->persist($picture);
            $entityManager->flush();

            return $this->redirectToRoute('application_index');
        }

        return $this->render('application/new.html.twig', [
            'application' => $picture,
            'form' => $form->createView(),
        ]);
    }
}
