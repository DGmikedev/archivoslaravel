<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <title>Gestor archvios | Home</title>
    <style>
        .highcharts-figure,
.highcharts-data-table table {
    min-width: 400px;
    max-width: 400px;
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

</head>
<body>
    <div id="container"> </div>

    <script>

        var title = 'Ventas 2024';
        var title_align = 'left';
        var subtitle = 'Comportamiento de ventas por año';
        var subtitle_align = 'left';
        var titleY = 'Millones de pesos';


        Highcharts.chart('container', {

title: {
    text: title,
    align: title_align,
},

subtitle: {
    text: subtitle,
    align: subtitle_align,
},

yAxis: {
    title: {
        text: titleY,
    }
},

xAxis: {
    accessibility: {
        rangeDescription: '2024'
    }
},

legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle',
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

    </script>
</body>
</html>