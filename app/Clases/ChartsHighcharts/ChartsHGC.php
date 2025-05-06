<?php

namespace App\Clases\ChartsHighcharts;

// Para servidor de highcharts
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

// grid de colores
use App\Clases\Colors;

class ChartsHGC{
    /**
     * 
     * name , cadena de nombre y path que tendrá la imagen en guardada en el servidor
     * title , título que mostrará la gráfíca en la parte superior de la imagen
     * title_align , lugar en el que se ubicará el título de la imagen
     * subtitle , subítutlo que que mostrará la gráfíca en la parte inmediata inferior al título de imagen
     * data , array de arrays con la data de los campos a gráficar [[ 'name':> 'name1', 'y':> 55.02 ], ]
     * subfijo , simbolo que acompañará el valor en la rebanada del valor,  '%' por deafult
     * extension , strings que indican la extención de la imagen jpg, png
     * 
     */
    static public function pieHGC( $name='pie_s', $title='title', $title_align='center', $subtitle='subtitle', $data=[['name1'=> 'var1','y'=> 50],['name2'=> 'var2','y'=> 50], ['name3'=> 'var3','y'=> 50]], $colors='',  $subfijo='%' ){
        $chartOptions = [
            'chart'   => [ 'type'=> 'pie' ],
            'title'   => [ 'text'=> $title, 'align'=>$title_align],
            'tooltip' => [ 'valueSuffix'=> $subfijo ],
            'subtitle'=> [ 'text'=> $subtitle],
            'colors' => $colors,
            
            // Leyenda del grafico
            'legend' => ['enabled' => false],
            
            // Quitar la leyenda de creditos highcharts.com
            'credits' => ['enabled' => false],
            
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

        
        return ChartsHGC::sen2RenderHGC( json_encode($chartOptions), $name );
    }

    public static function columnsHGC($name='columndemos', $title='title', $title_align='center', $subtitle='subtitle', $axisy='data eje y', $data=[ ['col', 37.33],['col2', 31.18] ], $colors=''){

        // dump($name, $title, $title_align, $subtitle, $data, $colors);

        $chartOptions = [
            'chart'   => [ 'type'=> 'column' ],
            'title'   => [ 'text'=> $title, 'align'=>$title_align],
            // 'tooltip' => [ 'valueSuffix'=> $subfijo ],
            'subtitle'=> [ 'text'=> $subtitle],

            'xAxis'=>[
                'type' => 'category',
                'labels' => [
                    'autoRotation' => [-45, -90],   // rotación de los títulos
                    'style' => [
                        'fontSize' => '13px',
                        'fontFamily' => 'Verdana, sans-serif'
                    ]
                ]
            ],
            'yAxis' => [
                'min'=> 0,
                'title'=> [
                    'text' => $axisy
                ]
            ],
           // Leyenda del grafico
           'legend' => ['enabled' => false],
            
           // Quitar la leyenda de creditos highcharts.com
           'credits' => ['enabled' => false],

           'tooltip' => [ ' pointFormat' => 'Population in 2021: <b>{point.y:.1f} millions</b>' ],
        
            'series' => [ [
                'name' => 'Population',
                'colors' => $colors,
                'colorByPoint' => true,
                'groupPadding' => 0,
                'data' => $data,
                'dataLabels' => [
                    'enabled' => true,
                    'rotation' => -90,
                    'color' => '#FFFFFF',
                    'inside' => true,
                    'verticalAlign' => 'top',
                    'format' => '{point.y:.1f}', // one decimal
                    'y' => 10, // 10 pixels down from the top
                    'style' => [
                        'fontSize' => '13px',
                        'fontFamily' => 'Verdana, sans-serif'
                    ]
                ]
            ] ],
        ];

        return ChartsHGC::sen2RenderHGC( json_encode($chartOptions), $name );


    }

    static public function sen2RenderHGC($json, $name){
    
    // Enviar datos al servidor de Highcharts Export
        $response = Http::post('http://localhost:7801/', [
            'infile' => $json,
            'type' => 'image/png', //'image/svg+xml', // También puedes usar 'image/png' o 'image/jpeg'
            'constr' => 'Chart'
        ]);

        if ($response->successful()) {

            // Guardar la imagen en storage/app/graficas/

            $nombre_imagen = 'highchartsGraficas/' . $name . '.png';

            Storage::disk('public')->put($nombre_imagen, $response->body());

            return json_encode(['status' => true, 'mensaje' => $nombre_imagen]);

        } else {

            return response()->json(['status' => 'error', 'mensaje' => 'No se pudo generar la gráfica.']);

        }

    }

    // Borra las imagenes creadas anteriormente
    static public function deletegraphHGC($name){

        $nombre_imagen = 'highchartsGraficas/' . $name . '.png';

        Storage::disk('public')->delete($nombre_imagen);

        return json_encode(['status' => true, 'mensaje' => $nombre_imagen . ' Borrada']);

    }
   
}
