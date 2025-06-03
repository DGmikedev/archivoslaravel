<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapsController extends Controller
{
    public function mapa(){

        $objetivo = "map1";
        $objetivo2 = "map2";
        return view('MapsView', ["mapa1" => $objetivo, "mapa2" => $objetivo2]);
    }
}
