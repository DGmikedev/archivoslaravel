<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PDF A BASE 64</title>
    <style>
        .contenedor{
            display:flex;
            flex-direction:column;
            -ms-flex-align: center;
        }
    </style>
</head>

<body
    style=" background-color:black; "
> 
    <table width="70%" style="margin: 0  auto;">
        <tr>
            <td colspan="2">
                <br>
                <form  enctype="multipart/form-data" id="fomulario">

                    <input style="color:white;" type="file" name="pdf" id="pdf" accept="application/pdf">
                    <br>
                    <br>
                    <button  id="envia" >ENVIAR</button>
                </form>
            </td>
        </tr>
        <tr>
            <td>
                <iframe
        src="data:application/pdf;base64,JVBERi0xLjcKCjEgMCBvYmogICUgZW50cnkgcG9pbnQKPDwKICAvVHlwZSAvQ2F0YWxvZwogIC9QYWdlcyAyIDAgUgo+PgplbmRvYmoKCjIgMCBvYmoKPDwKICAvVHlwZSAvUGFnZXMKICAvTWVkaWFCb3ggWyAwIDAgMjAwIDIwMCBdCiAgL0NvdW50IDEKICAvS2lkcyBbIDMgMCBSIF0KPj4KZW5kb2JqCgozIDAgb2JqCjw8CiAgL1R5cGUgL1BhZ2UKICAvUGFyZW50IDIgMCBSCiAgL1Jlc291cmNlcyA8PAogICAgL0ZvbnQgPDwKICAgICAgL0YxIDQgMCBSIAogICAgPj4KICA+PgogIC9Db250ZW50cyA1IDAgUgo+PgplbmRvYmoKCjQgMCBvYmoKPDwKICAvVHlwZSAvRm9udAogIC9TdWJ0eXBlIC9UeXBlMQogIC9CYXNlRm9udCAvVGltZXMtUm9tYW4KPj4KZW5kb2JqCgo1IDAgb2JqICAlIHBhZ2UgY29udGVudAo8PAogIC9MZW5ndGggNDQKPj4Kc3RyZWFtCkJUCjcwIDUwIFRECi9GMSAxMiBUZgooSGVsbG8sIHdvcmxkISkgVGoKRVQKZW5kc3RyZWFtCmVuZG9iagoKeHJlZgowIDYKMDAwMDAwMDAwMCA2NTUzNSBmIAowMDAwMDAwMDEwIDAwMDAwIG4gCjAwMDAwMDAwNzkgMDAwMDAgbiAKMDAwMDAwMDE3MyAwMDAwMCBuIAowMDAwMDAwMzAxIDAwMDAwIG4gCjAwMDAwMDAzODAgMDAwMDAgbiAKdHJhaWxlcgo8PAogIC9TaXplIDYKICAvUm9vdCAxIDAgUgo+PgpzdGFydHhyZWYKNDkyCiUlRU9G"
        width=100% height=400 id="marcoPDF"></iframe>
            </td>
        </tr>
    </table>
    <div style=" width:70% height:400; font-size:5px; color:#fc0505;" id="base64pdf"> </div>    
    <div id="mensaje"></div>
    
    <script> 
        document.addEventListener('DOMContentLoaded', function() {
        
            const frm = document.getElementById("fomulario");
            const btn = document.getElementById("envia");
            const mensajeDiv = document.getElementById('mensaje');
            const marcoPDF = document.getElementById('marcoPDF');
            const base64pdf = document.getElementById('base64pdf');

            btn.addEventListener("click", (event)=>{
                event.preventDefault(); // Evita el envío tradicional del formulario
                const form = new FormData(frm);

                fetch('/pdf2base64', {
                    method:"POST",
                    body: form,
                    headers:{
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                }).then( response => response.json())
                .then(data => {
                    base64pdf.innerHTML = data.cadena64;
                    marcoPDF.src = data.cadena64;
                    
                })
                .catch(error => {
                    console.error('Error en la petición:', error);
                    mensajeDiv.innerHTML = '<div class="alert alert-danger">Ocurrió un error al enviar la petición.</div>';
                });
            })
        
        });
    </script>
</body>
</html>