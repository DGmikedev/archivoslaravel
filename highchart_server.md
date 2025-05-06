# Servidor de Highcharts para procesar Imagenes

Servidor creado por HighCharts para crear imagenes en el backend.

## instalación 

```bash

npm install -g highcharts-export-server

```
## ponerlo en marcha

```bash

highcharts-export-server --enableServer 1

```

Se debe linkear el storage a publick para poder guardar las imagenes gnerada

```bash

php artisan storage:link

```

# para crear una imagen en PHP

Se debe crear un JSON con los parámetros de la gráfica 

```php

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


        // eso se envia a la API del servidor 
        // json_encode($chartOptions)         
```

se obtiene:

```js
{"chart":{"type":"pie"},"title":{"text":"Productos Vendidos 2024","align":"center"},"tooltip":{"valueSuffix":"%"},"subtitle":{"text":""},"colors":["#82e0aa","#58d68d","#2ecc71","#28b463","#239b56","#1d8348","#186a3b"],"legend":{"enabled":false},"credits":{"enabled":false},"plotOptions":{"pie":{"allowPointSelect":true,"cursor":"pointer","dataLabels":[{"enabled":true,"distance":20},{"enabled":true,"distance":-40,"format":"{point.percentage:.1f}%","style":{"fontSize":"1.2em","textOutline":"none","opacity":0.7},"filter":{"operator":">","property":"percentage","value":10}}]}},"series":[{"name":"Percentage","colorByPoint":true,"data":[{"name":"producto 1","y":20},{"name":"producto 2","y":30},{"name":"producto 3","y":10},{"name":"producto 4","y":20},{"name":"producto 5","y":20}]}]
```

Se crea el json y se hace la petición al servidor localhost:7801/

```php

 $response = Http::post('http://localhost:7801/', [
            'infile' => $json,
            'type' => 'image/png', //'image/svg+xml', // También puedes usar 'image/png' o 'image/jpeg'
            'constr' => 'Chart'
        ]);
```

Se crea una clase para que ahí se creen las diferentes gráficas a mostrar

* app\Clases\ChartsHighcharts\ChartsHGC.php