<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TiposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Tipos 
        // Simples o primitivos
        /* int */      $id = 10;
        /* string */   $nombre = "usuario name";
        /* array */    $datos_extra_usuario = ["nickname", 125251, true];
        /* ?string */  $email = "usuario@mail.com";

        echo "Test de aplicación de tipos";
    }


    public function test_tipos(){

        /*
        
        Documento (abstracta)
        │
        ├── Informe
        ├── Factura
        ├── Recibo
        └── Reporte
        
        */

    }

    /**
     * Show the form for creating a new resource.
     * 
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
