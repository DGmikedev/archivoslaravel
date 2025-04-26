<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Manejador de Archvios</title>
</head>
<body>

    <form enctype="multipart/form-data" id="form642Save">
        <input type="text" name="nombre" id="nombre" placeholder="Ingresa el Nombre"><br><br>
        <input type="text" name="carpeta" id="carpeta" placeholder="Ingersa el path o la carpeta donde se guardará"><br><br>
        <input type="file" name="imagen" accept="image/*"><br><br>
        <input type="button" value="enviar" id="b642save">
    </form>

    <script>

        document.addEventListener('DOMContentLoaded', function(){

            const b642save = document.getElementById("b642save");
            
            const frm = document.getElementById("form642Save");

            b642save.addEventListener('click', (event)=>{

                event.preventDefault(); 
            
                const datad = new FormData(frm);
            
                fetch('/ImageBase64-save',{
                    method:"POST",
                    body: datad,
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
        });
        
    </script>
</body>
</html>