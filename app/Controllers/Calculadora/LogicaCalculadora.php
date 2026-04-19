<?php

namespace App\Controllers\Calculadora;

use App\Controllers\BaseController;


class LogicaCalculadora extends BaseController
{


    // public function __construct()
    // {
    //     helper('form');
    // }


    public function VerCalculadora()
    {
        $data = [
            'title' => 'Calculadora PMA-SL',
        ];
        return view("Calculadora/VistaCalculadora", $data);
    }
}
