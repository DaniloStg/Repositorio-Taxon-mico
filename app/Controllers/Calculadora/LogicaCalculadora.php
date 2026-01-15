<?php

namespace App\Controllers\Calculadora;

use App\Controllers\BaseController;


class LogicaCalculadora extends BaseController
{


    // public function __construct()
    // {
    //     helper('form');
    //     $this->Turnos = new Turnos();
    // }


    public function VerCalculadora(){

        return view("Calculadora/VistaCalculadora");
    }


}
