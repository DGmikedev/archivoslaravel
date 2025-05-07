<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;

# Presentación demo 
use App\Clases\PphOffice\Presentaciondemo;

# Presentación 1 
use App\Clases\PphOffice\Presentacion;

# Presentación 2
use App\Clases\PphOffice\Presentacion2;

# Presentación 3 
use App\Clases\PphOffice\Presentacion3;

# Presentación 4
use App\Clases\PphOffice\Presentacion4;

# Presentación 5
use App\Clases\PphOffice\Presentacion5;

# Presentación 6
use App\Clases\PphOffice\Presentacion6;

# Presentación 7
use App\Clases\PphOffice\Presentacion7;

# Presentación 8
use App\Clases\PphOffice\Presentacion8;

# Presentación 9
use App\Clases\PphOffice\Presentacion9;

# Presentación 10
use App\Clases\PphOffice\Presentacion10;



class PPTController extends Controller
{
    public function presentaciondemo(){

        $presentacion = new Presentaciondemo();

        return $presentacion->crearppt();

    }

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

    public function presentacion5(){

        $presentacion = new Presentacion5();

        return $presentacion->crearppt5();

    }

    public function presentacion6(){

        $presentacion = new Presentacion6();

        return $presentacion->crearppt6();

    }

    public function presentacion7(){

        $presentacion = new Presentacion7();

        return $presentacion->crearppt7();

    }

    public function presentacion8(){

        $presentacion = new Presentacion8();

        return $presentacion->crearppt8();

    }

    public function presentacion9(){

        $presentacion = new Presentacion9();

        return $presentacion->crearppt9();

    }

    public function presentacion10(){

        $presentacion = new Presentacion10();

        return $presentacion->crearppt10();

    }
    
}
