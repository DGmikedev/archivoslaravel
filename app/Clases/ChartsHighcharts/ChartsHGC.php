<?php

namespace App\Clases\ChartsHighcharts;

// Para servidor de highcharts
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ChartsHGC{
    /**
     * name , cadena de nombre y path que tendrá la imagen en guardada en el servidor
     * title , título que mostrará la gráfíca en la parte superior de la imagen
     * title_align , lugar en el que se ubicará el título de la imagen
     * subtitle , subítutlo que que mostrará la gráfíca en la parte inmediata inferior al título de imagen
     * data , array de arrays con la data de los campos a gráficar [[ 'name'=> 'name1', 'y'=> 55.02 ], ]
     * subfijo , simbolo que acompañará el valor en la rebanada del valor,  '%' por deafult
     * extension , strings que indican la extención de la imagen jpg, png
     * 
     */
    static public function pieHGC( $name='pie_s', $title='title', $title_align='center', $subtitle='subtitle', $data=[['name1'=> 'var1','y'=> 50],['name2'=> 'var2','y'=> 50]], $subfijo='%', $extension='png' ){
        $chartOptions = [
            'chart'   => [ 'type'=> 'pie' ],
            'title'   => [ 'text'=> $name, 'align'=>$title_align],
            'tooltip' => [ 'valueSuffix'=> $subfijo ],
            'subtitle'=> [ 'text'=> $subtitle],
            'colors' => [
                '#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572',
                '#FF9655', '#FFF263', '#6AF9C4'
            ],

            'plotOptions'=> [
                'pie'=> [
                    'allowPointSelect'=> true,
                    'cursor'=> 'pointer',
                    'dataLabels'=> [
                        [ 'enabled'=> true, 'distance'=> 20 ],
                        [
                            'enabled'=> true,
                            'distance'=> -40,
                            'format'=> '{point.percentage:.1f}%',
                            'style'=> [
                                'fontSize'=> '1.2em',
                                'textOutline'=> 'none',
                                'opacity'=> 0.7
                            ],
                            'filter'=> [
                                'operator'=> '>',
                                'property'=> 'percentage',
                                'value'=> 10
                            ],
                        ]
                    ]
                ]
            ],
            'series'=> [
                [
                    'name'=> 'Percentage',
                    'colorByPoint'=> true,
                    'data'=> $data,
                ]
            ]
         ];

        return ChartsHGC::sen2RenderHGC( json_encode($chartOptions), $name, $extension );
    }

    static public function sen2RenderHGC($json, $name, $extension){
    
    // Enviar datos al servidor de Highcharts Export
        $response = Http::post('http://localhost:7801/', [
            'infile' => $json,
            'type' => 'image/png', //'image/svg+xml', // También puedes usar 'image/png' o 'image/jpeg'
            'constr' => 'Chart'
        ]);

        if ($response->successful()) {

            // Guardar la imagen en storage/app/graficas/

            $nombre_imagen = 'highchartsGraficas/' . $name . '.' . $extension;

            Storage::disk('public')->put($nombre_imagen, $response->body());

            // return response()->json(['status' => 1, 'mensaje' => $nombre_imagen]);
            return json_encode(['status' => true, 'mensaje' => $nombre_imagen]);

        } else {

            return response()->json(['status' => 'error', 'mensaje' => 'No se pudo generar la gráfica.']);

        }

    }


   
}
