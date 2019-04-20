<?php

namespace App\Twig;

use App\Kernel;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpKernel\KernelInterface;
use Twig\Extension\RuntimeExtensionInterface;

class AppRuntime implements RuntimeExtensionInterface
{
    private $kernel;

    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    public function normalizeFilter($text)
    {
        return strtolower(str_replace("/","-",str_replace(" ","-",$text)));
    }

    public function pathizeFilter($text)
    {
        return strtolower(str_replace("-","/",$text));
    }

    public function getGallery() {
        $finder = new Finder();
        $results = [];
// find all files in the current directory
        $finder->files()->in($this->kernel->getProjectDir().'/public/img/gallery/');

        if ($finder->hasResults()) {
            foreach ($finder as $file) {
                $absoluteFilePath = $file->getRealPath();
                $fileNameWithExtension = $file->getRelativePathname();
                $results[] = $fileNameWithExtension;

            }
        }

        return $results;
    }

}