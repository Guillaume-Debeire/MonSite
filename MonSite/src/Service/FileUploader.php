<?php

namespace App\Service;

use App\Entity\Picture;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{

    private $pictureFolder;

    public function __construct($pictureFolder)
    {
        $this->pictureFolder = $pictureFolder;
    }

    /**
     * Et la j'ai la meme fonctionnalité dédiée à un cas particulier
     *
     * @param UploadedFile|null $image on autorise le null si jamais aucune image n'a été fournie
     * @return string|null
     */
    function moveImage(?UploadedFile $image, string $targetFolder, $prefix = ''): ?string
    {
        $newFilename = null;

        if ($image !== null) {
            // on a décidé d'appeler notre fichier
            $newFilename = $prefix . '.' . $image->guessExtension();
            

            // Move the file to the directory where brochures are stored
            $image->move(
                $targetFolder,
                $newFilename
            );
        }
        return $newFilename;
    }

    // function movePicture(?UploadedFile $image, Picture $picture)
    // {
    //     $imageName = $this->moveImage($image, $this->pictureFolder, 'plant-');
    //     if ($imageName !== null) {
    //         $plant->setPicture($imageName);
    //     }
    // }
}
