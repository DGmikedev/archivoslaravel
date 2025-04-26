<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ExpendeCredencial</title>

    <style>
        @page {
            margin: 15px 5px;
            font-family: monospace;
            background-color: #3498db; 
        }

        /*
        header {
            position: fixed;
            top: -60px;
            left: 0px;
            right: 0px;
            height: 10px;
            font-size: 8px !important;
            background-color: #b0e2eb;
            color: #000000;
            text-align: center;
        }
        */
        footer {
            position: fixed; 
            bottom: -10px; 
            left: 0px; 
            right: 0px;
            height: 30px; 
            font-size: 6px !important;
            background-color: #00b140;
            color: #000000;
            text-align: center;
        } 
        :root{
            --fnt-big: 10px;
            --fnt-sml: 7px;
        }

        /*
        display: flex;
        justify-content: center; /* Centra la tabla horizontalmente 
        align-items: center;     /* Centra la tabla verticalmente 
        height: 100vh;           /* Hace que el contenedor ocupe toda la altura de la ventana 
        */
        .contenedor{
            display:flex;
            flex-direction: column;
            justify-content: center;

        }
        
       html body{
            
            background-size: cover; /* Asegura que la imagen cubra toda la pantalla */
            background-position: center; /* Centra la imagen */
            background-repeat: no-repeat; /* Evita que la imagen se repita*/
        }
      
    </style>
</head>
<body style="
    background-image:url({{ asset('imgs/fondocdmx_portrait.png') }});
    background-size: 200px;
    top:70px;
">
    <header></header>
    <main>
        <div class="contenedor">
            <hr style="color:#00b140;">
            <table style="width:100%;">
                <tr>
                    <td style="
                        width: 1cm;
                        height:1cm;
                        text-align:center;
                    ">
                    <img src="{{ asset('imgs/logocdmx_portrait.png') }}"  width="50px" height="40px" alt="">
                    </td>
                </tr>
            </table>
            <table style="width:100%">
            <tr>
                <td ></td>
                <td style="
                    width:2.5cm;
                    height:3cm;
                ">
                    <img src="{{ asset('imgs/photo_portrait.png') }}" width="100px" height="120px" alt="">
                </td>
                <td></td>
            </tr>
        </table>
        <div><span style="color:white; font-size:5px">.</span></div>
        <table width="100%" >
            <tr style="padding-top: 20px" >
                <td style="font-size:var(--fnt-big); text-align:center; color:white; "><u><b>JUAN ANGEL SANCHEZ MILEI</b></u></td>
            </tr>
            <tr style="padding:10px">
                <td style="font-size:var(--fnt-sml); text-align: center;color:white;"><b>NOMBRE</b></td>
            </tr>
            <tr style="padding:10px">
                <td style="font-size:var(--fnt-big); text-align:center; color:white;"><u><b>DESARROLLADOR JR</b></u></td>
            </tr>
            <tr style="padding:10px">
                <td style="font-size:var(--fnt-sml); text-align: center;color:white;"><b>PUESTO</b></td>
            </tr>
            <tr style="padding:10px">
                <td style="font-size:var(--fnt-big); text-align: center;color:white;"><u><b>SEGURIDAD INFORMÁTICA</b></u></td>
            </tr>
        </table>
          
        </div>
    </main>
    <footer>
        <p style="color:white;" >Tel: 55-2659512 Av. Vizcainas # 123 Del Fake</p>
    </footer>
  <!-- Salto de pagina -->
  <p style="page-break-after: never;"> 
        <br>
        <br>
            <h4>POLITICA:</h4>
            <p style="font-size:var(--fnt-sml); text-align: left;color:gray;"><b>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam mollitia asperiores reiciendis voluptas? Ad, necessitatibus facilis tempora inventore eaque perferendis! Perferendis aperiam dolor sequi. Consequuntur rerum quaerat exercitationem vero sunt.
            </b>
            </p>
    


</body>

</html>