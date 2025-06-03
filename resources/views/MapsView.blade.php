<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mapa</title>
</head>
<body>
    <div>
        <div><x-MapsComponent target="{{ $mapa1 }}"></x-MapsComponent></div>
        <div><x-MapsComponent target="{{ $mapa1 }}"></x-MapsComponent></div>
        <div><x-MapsComponent target="{{ $mapa1 }}"></x-MapsComponent></div>
        <div><x-MapsComponent target="{{ $mapa1 }}"></x-MapsComponent></div>
    </div>
    <x-MapsComponent target="{{ $mapa2 }}"></x-MapsComponent>


 </body>
</html>