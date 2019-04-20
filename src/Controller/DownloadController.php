<?php

namespace App\Controller;

use App\Entity\Announce;
use App\Entity\TourDate;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\Annotation\Route;

class DownloadController extends AbstractController
{
    /**
     * @Route("/download/disc", name="download_disc")
     */
    public function downloadDisc(KernelInterface $kernel)
    {

        $publicResourcesFolderPath = $kernel->getRootDir() . '/../public/mp3/';
        $filename = "KRENFEN_IGNIS.zip";

        return new BinaryFileResponse($publicResourcesFolderPath.$filename);
    }

}
