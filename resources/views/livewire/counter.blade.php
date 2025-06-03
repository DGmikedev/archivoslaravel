
<div>
   <h1>Conteo de Click!</h1>
   <button wire:click="increment">SUMA!</button>
   {{ $count }}
   {{ "Componente" }}
   <br>
   {{ $saludo }}
   <br>
   <button wire:click="actualiza_grafica" >ACTUALIAR GRAFICA</button>
   
   <div id="container"> cc </div>
</div>
<script> /*




<style>
    .highcharts-figure,
.highcharts-data-table table {
    min-width: 360px;
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tbody tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

.highcharts-description {
    margin: 0.3rem 10px;
}

</style>
*/



   Highcharts.chart('container', {
      title: {
        text: 'Growth of Internet Users Worldwide (logarithmic scale)'
    },

    accessibility: {
        point: {
            valueDescriptionFormat:
                '{xDescription}{separator}{value} million(s)'
        }
    },

    xAxis: {
        title: {
            text: 'Year'
        },
        categories: [1994, 2000, 2005, 2010, 2015, 2020, 2023]
    },
  

    yAxis: {
        type: 'logarithmic',
        title: {
            text: 'Number of Internet Users (in millions)'
        }
    },

    tooltip: {
        headerFormat: '<b>{series.name}</b><br />',
        pointFormat: '{point.y} million(s)'
    },

    series: [{
        name: 'Internet Users',
        keys: ['y', 'color'],
        data: [
            [100, '#0000ff'],
            [361, '#8d0073'],
            [1018, '#ba0046'],
            [2025, '#d60028'],
            [3192, '#eb0014'],
            [4673, '#fb0004'],
            [5200, '#ff0000']
        ],
        color: {
            linearGradient: {
                x1: 0,
                x2: 0,
                y1: 1,
                y2: 0
            },
            stops: [
                [0, '#0000ff'],
                [1, '#ff0000']
            ]
        }
    }]
});  

</script>
