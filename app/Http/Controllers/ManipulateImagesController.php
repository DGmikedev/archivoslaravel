<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

// para  salval archivos SVG
use Illuminate\Support\Facades\File;

// Para servidor de highcharts
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;



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

                // return response()->json(['estatus' => true]);

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

    public function creacionHGCHRT(){
/*
         // Datos de ejemplo para una gráfica de barras

         $chartOptions = [
            'chart'   => [ 'type'=> 'pie' ],
            'title'   => [ 'text'=> 'Egg Yolk Composition' ],
            'tooltip' => [ 'valueSuffix'=> '%' ],
            'subtitle'=> [ 'text'=> 'SUBTITULO PIE'],

            'plotOptions'=> [
                'pie'=> [
                    'allowPointSelect'=> true,
                    'cursor'=> 'pointer',
                    'dataLabels'=> [
                        [ 'enabled'=> true, 'distance'=> '20' ],
                        [
                            'enabled'=> true,
                            'distance'=> '-40',
                            'format'=> '{point.percentage:.1f}%',
                            'style'=> [
                                'fontSize'=> '1.2em',
                                'textOutline'=> 'none',
                                'opacity'=> '0.7'
                            ],
                            'filter'=> [
                                'operator'=> '>',
                                'property'=> 'percentage',
                                'value'=> '10'
                            ],
                        ]
                    ]
                ]
            ],
            'series'=> [
                [
                    'name'=> 'Percentage',
                    'colorByPoint'=> true,
                    'data'=> [
                        [
                            'name'=> 'DOOM',
                            'y'=> 250.02
                        ],
                       
                        [
                            'name'=> 'Carbohydrates',
                            'y'=> 1.09
                        ],
                        [
                            'name'=> 'Protein',
                            'y'=> 15.5
                        ],
                        [
                            'name'=> 'Ash',
                            'y'=> 1.68
                        ]
                    ]
                ]
            ]
         ];
        */
        // NO MOVER
         
         $chartOptions = [

            // Bloque titutlo y subtitulo
            'chart' =>    ['type' => 'bar'],                                  // , 'width' => '500', 'height' => '400'
            'title' =>    ['text' => 'Venta Anual 2024', 'align' => 'left'],  //  eje x: 190 ,, text: document.getElementById('title-input').value
           'subtitle' => ['text' => '(Eje y: # Trimestre)(Eje x : Millones de pesos)', 'align' => 'right'],

            // Leyenda del grafico
            'legend' => ['enabled' => false],

            // Colores en las series
            'plotOptions' => [
                'series' => [ 'color'=>'#58d68d',  
                                'dataLabels' => [ 
                                    'enabled' => true, 'format' => '{point.y} Millones de pesos' 
                                ] 
                            ]  
            ], 

            // Quitar la leyenda de creditos highcharts.com
            'credits' => ['enabled' => false],

            'xAxis' => [
                'categories' => ['TRMSTR 1', 'TRMSTR 2', 'TRMSTR 3', 'TRMSTR 4'],
                'title' => ['text' => '', 'align' => 'low'],
                'labels' => ['style' => [
                            'color' => '#000000' ]
                        ]
            ],
            'yAxis' => [
                'min' => 0,
                'title' => ['text' => 'MDP', 
                            // 'align' => 'low'     //high
                        ],  
                'labels' => [
                        'overflow' => 'justify',
                        'format' => '${value} Millones',
                        'style' => [
                            'color' => '#000000' ]
                        ]
            ],
            'series' => [
                [
                    'name' => '2024',
                    'data' => [0.75, 4.5, 4, 3]
                ]
            ]
        ];   

        
        // Enviar datos al servidor de Highcharts Export
        $response = Http::post('http://localhost:7801/', [
            'infile' => json_encode($chartOptions),
            'type' => 'image/png', //'image/svg+xml', // También puedes usar 'image/png' o 'image/jpeg'
            'constr' => 'Chart'
        ]);

        if ($response->successful()) {

            // Guardar la imagen en storage/app/graficas/
            // Storage::disk('public')->put('highchartsGraficas/grafica-ventas.png', $response->body());
            Storage::disk('public')->put('highchartsGraficas/barra.png', $response->body());

            return response()->json(['status' => 'ok', 'mensaje' => 'Gráfica generada correctamente.']);

        } else {

            return response()->json(['status' => $response, 'mensaje' => 'No se pudo generar la gráfica.']);

        }

    }

}
