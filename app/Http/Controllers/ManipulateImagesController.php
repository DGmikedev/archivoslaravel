<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;



class ManipulateImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function imageBase64_save(Request $request){

        try{
            // Validamos que sea imagen
            $request->validate([ 'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', ]);

            // Se nombre la imagen
            $imageName = time()."_$request->nombre".'.'.$request->imagen->extension();  

            $carpeta = $request->carpeta;

            // Se guarda imagen
            $request->imagen->move(public_path($carpeta), $imageName);

            return response()->json(["estatus" => true]);

        }catch(Error $e){

            return response()->json(["estatus" => $e]);    

        }

    } 

    public function svgbase64_save(Request $request){

        try{

            $base64 = $request->input('imagen');

            if (preg_match('/^data:image\/svg\+xml;base64,/', $base64)) {

                return response()->json(['estatus' => true]);

                // Eliminar el encabezado
                $base64 = substr($base64, strpos($base64, ',') + 1); 

                // Reemplazar espacios si los hay
                $base64 = str_replace(' ', '+', $base64); 

                $svg = base64_decode($base64);

                if ($svg === false) {
                    return response()->json(['error' => 'Base64 inválido'], 400);
                }

                $nombreArchivo = 'imagen_' . time() . '.svg';
                $ruta = public_path('imagenes/' . $nombreArchivo);
                File::put($ruta, $svg);
                return response()->json(['estatus' => true]);
            }
        }catch(Error $e){
            return response()->json(["estatus" => $e]);    
        }

    } 

}
