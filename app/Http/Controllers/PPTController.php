<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;

# Presentación 1 
use App\Clases\PphOffice\Presentacion;


class PPTController extends Controller
{
    public function presentacion(){

        $presentacion = new Presentacion();

        return $presentacion->crearppt1();

    }
}
