<?php

namespace App\Controllers\Repositorio;

use App\Controllers\BaseController;


class RepoPrincipalController extends BaseController
{


    // public function __construct()
    // {
    //     helper('form');
    // }


    // PROPUESTA 1
    public function Ficha()
    {

        return view("Repositorio/Principal/Ficha(Propuesta 1)");
    }

    // PROPUESTA 2
    public function HomeRepositorio()
    {

        return view("Repositorio/Principal/PrincipalRepoView(Propuesta 2)");
    }

    // PROPUESTA 2
    public function Fichatarjeta()
    {

        return view("Repositorio/Principal/FichaTarjetaLink(Propuesta 2)");
    }

    // PROPUESTA 3
    public function FichaModal()
    {

        return view("Repositorio/Principal/FichaConModal(Propuesta 3)");
    }
}
