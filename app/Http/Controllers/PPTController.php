<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;

# Presentación 1 
use App\Clases\PphOffice\Presentacion;

# Presentación 2
use App\Clases\PphOffice\Presentacion2;

# Presentación 3 
use App\Clases\PphOffice\Presentacion3;

# Presentación 4
use App\Clases\PphOffice\Presentacion4;


class PPTController extends Controller
{
    public function presentacion(){

        $presentacion = new Presentacion();

        return $presentacion->crearppt1();

    }

    public function presentacion2(){

        $presentacion = new Presentacion2();

        return $presentacion->crearppt2();

    }

    public function presentacion3(){

        $presentacion = new Presentacion3();

        return $presentacion->crearppt3();

    }

    public function presentacion4(){

        $presentacion = new Presentacion4();

        return $presentacion->crearppt4();

    }
}
