<?php

namespace App\Controllers\Repositorio;

use App\Controllers\BaseController;


class RepoPrincipalController extends BaseController
{


    // public function __construct()
    // {
    //     helper('form');
    // }


    public function HomeRepositorio()
    {

        return view("Repositorio/PrincipalRepoView");
    }

    public function Ficha()
    {

        return view("Repositorio/Ficha");
    }

        public function FichaRedireccion()
    {

        return view("Repositorio/FichaRedireccion");
    }
}
