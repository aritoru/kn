<?php

namespace App\Twig;

use Twig\Extension\RuntimeExtensionInterface;

class AppRuntime implements RuntimeExtensionInterface
{
    public function __construct()
    {
        // this simple example doesn't define any dependency, but in your own
        // extensions, you'll need to inject services using this constructor
    }

    public function normalizeFilter($text)
    {
        return strtolower(str_replace("/","-",str_replace(" ","-",$text)));
    }

    public function pathizeFilter($text)
    {
        return strtolower(str_replace("-","/",$text));
    }

}