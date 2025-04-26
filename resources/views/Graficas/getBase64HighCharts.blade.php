<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <title>Graficas</title>
    <style>
        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 360px;
            max-width: 800px;
            margin: 1em auto;
        }
    </style>
</head>
<body>

<figure class="highcharts-figure">
    <div id="container"></div>
    <form enctype="multipart/form-data" id="form642Save" style="display: none;">
        <input type="text" name="nombre" id="nombre" placeholder="Ingresa el Nombre"><br><br>
        <input type="text" name="carpeta" id="carpeta" placeholder="Ingersa el path o la carpeta donde se guardará"><br><br>
        <!-- <input type="text" name="imagen" ><br><br> -->
        <input type="button" value="enviar" id="b642save">
    </form>
</figure>

<script>

    var data;
    var chart;
    var formulario = document.getElementById("form642Save");

    document.addEventListener( 'DOMContentLoaded', function(){
        nombre.value  = "Grafica";
        carpeta.value = "HigChartsote";
        returnBase64();

    });

    function crearGrafica(){
        return new Promise((resolve) => {
            ///////////////////////////////////////////////
            // AQUI VA LA GRAFICA A SUBIR EN FORMATO SVG //
            ///////////////////////////////////////////////

            chart = Highcharts.chart('container', {
                chart: {
                    type: 'area',
                    zoomType: 'xy',
                    events:{
                        load: function(){ resolve(); }
                    }
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },
            
                series: [{
                    data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 126.0, 148.5, 216.4, 194.1, 95.6, 54.4]
                }]
            });
        });

        //////////////////////////////////////////////
        //////////////////////////////////////////////

    }

    function getBase64(){
        
        return new Promise((resolve) => {

            // Get Actual SVG of a chart
            let svgString = chart.getSVG();

            // Use DOMParser to parse new svg element from svgString
            let parser = new DOMParser(); 
            let svgElem = parser.parseFromString(svgString, "image/svg+xml").documentElement;

            // serialize the element to String
            let s = new XMLSerializer().serializeToString(svgElem);

            let b64 = 'data:image/svg+xml;base64,';

            b64 += btoa(s);

            data = new FormData(formulario);
            
            data.append("imagen", b64);

            // console.log(data);

            fetch('/Base64-save',{
                    method:"POST",
                    body:data,
                    headers:{
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then( response => response.json())
                .then( data =>  console.log( data ) )
                .catch(error => {
                    console.error( 'Error en la petición:', error );
                });

        })
    }

    async function returnBase64(){
        await crearGrafica();
        getBase64();
            
        

    } 






        /*
        Highcharts.chart('container', {

            title: {
                text: 'U.S Solar Employment Growth',
                align: 'left'
            },
            
            subtitle: {
                text: 'By Job Category. Source: <a href="https://irecusa.org/programs/solar-jobs-census/" target="_blank">IREC</a>.',
                align: 'left'
            },
            
            yAxis: {
                title: {
                    text: 'Number of Employees'
                }
            },
            
            xAxis: {
                accessibility: {
                    rangeDescription: 'Range: 2010 to 2022'
                }
            },
            
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            
            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    pointStart: 2010
                }
            },
            
            series: [{
                name: 'Installation & Developers',
                data: [
                    43934, 48656, 65165, 81827, 112143, 142383,
                    171533, 165174, 155157, 161454, 154610, 168960, 171558
                ]
            }, {
                name: 'Manufacturing',
                data: [
                    24916, 37941, 29742, 29851, 32490, 30282,
                    38121, 36885, 33726, 34243, 31050, 33099, 33473
                ]
            }, {
                name: 'Sales & Distribution',
                data: [
                    11744, 30000, 16005, 19771, 20185, 24377,
                    32147, 30912, 29243, 29213, 25663, 28978, 30618
                ]
            }, {
                name: 'Operations & Maintenance',
                data: [
                    null, null, null, null, null, null, null,
                    null, 11164, 11218, 10077, 12530, 16585
                ]
            }, {
                name: 'Other',
                data: [
                    21908, 5548, 8105, 11248, 8989, 11816, 18274,
                    17300, 13053, 11906, 10073, 11471, 11648
                ]
            }],
            
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });

        */
 



</script>

</body>
</html>