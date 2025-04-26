<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $data['titulo_pagHTML'] }}</title>
    <style>
         @page {
                margin: 100px 50px;
                
            }
        :root{
            --fnt-muygrande:17px;
            --fnt-grande:13px;
            --fnt-mediana:11px;
            --fnt-chica:8px;

            --fnt-color-txt-gral: #000;
            --color-resaltado: #4a9c43;
            --color-resaltado-soft: #000;
            --color-contraste: #000;

        }

        .tutulos{
            font-size: var(--fnt-grande);
            color: var(--fnt-color-txt-gral);
        }
       

        header {
            position: fixed;
            top: -70px;
            left: 0px;
            right: 0px;
            height: 70px;
            font-size: var(--fnt-grande) !important;
            background-color: #ffffff;
            color: rgb(0, 0, 0);
            text-align: center;
        /*    line-height: 60px; */
        }

        footer {
            position: fixed; 
            bottom: -60px; 
            left: 0px; 
            right: 0px;
            height: 50px; 
            font-size: 12px !important;
          /*   background-color: #000; */
            color: #000000;
          /*  line-height: 35px;  */
        }
        .tbl{
            /* border: 1px solid black; */
            width:90%;
            color:block;
            
        }
    </style>
</head>
<body>
    <!-- Define header and footer blocks before your content -->
    <header>
        <table width="100%">
            <tr>
                <td>
                    <img src="{{ asset('/imgs/membretada/cintillo_sup_izq.png') }}" alt="cdm_mx" width="250px">
                </td>
                <td style="text-align:center;">
                    SECRETARIA DE SALUD DE LA CIUDAD DE MÉXICO<br>
                    SERVICIOS DE SALUD PÚBLICA DE LA CIUDAD DE MÉXICO<br>
                    JURISDICCIÓN SANITRARIA MIGUEL HIDALGO  DIRECCIÓN 
                </td>
            </tr>
        </table>
        <br>
    </header>

    <footer>
        <table style=" margin: 0 auto; width:100%;">
            <tr>
                <td style="text-align:left;">
                    Dirección falsa 123 Col. Falsa<br>
                    Alcaldia Falsa. C.P. 00000 Ciudad de México<br>
                    Tel. 55-125125478

                </td>
                <td style="text-align:right;">
                    CIUDAD <b>INOVADORA</B><br> Y DE <b>DERECHOS</b>
                </td>
            </tr>
        </table>
    </footer>

    <main>
        <br>
        <div style="text-align:right;  font-size: var(--fnt-chica); font-weight:bold;">
            <img src="{{ asset('/imgs/membretada/cintillo_sup_der.png') }}" alt="cdm_mx" width="250px">
           
        </div>
        <div style="text-align:right;  font-size: var(--fnt-grande); font-weight:bold;">

            Ciudad de México a XX de XXXX del 2025<br>
            Oficio: JDF/GNRIV  NUMERO  2021<br>
            Asunto: Relacionado con reingresode personal confinado.
        </div>
        <br>
        <div style="text-align:left;  font-size: var(--fnt-muygrande); font-weight:bold;">

           C.C SUBDIRECTORES Y JEFES DE UNIDAD DE<br>
            ATENCIÓN MÉDICA DE LA JURISDICCIÓN SANTARIA<br>
            MIGUEL HIDAGO<br>
            PRESENTE
        </div>
        <br>
        
        
        <p> 
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat ipsam soluta illo pariatur cupiditate nostrum accusantium tempore numquam quae. Suscipit numquam rerum architecto mollitia esse consectetur fugit facilis eius natus!
        </p>

        <div style="text-align:center;">
            <table width="100%"  class="tbl" 
                style=" margin:0 auto; text-align:left; 
                        border:1px solid black;
                        font-family:monospace;
                        font-size:10px;
                        font-weight:bold;
                ">
                <tr style="background-color:#bbe2e2"><td width="15%">Elemento HTML</td>      <td width="10%">Tipo</td>           <td width="75%">Descripción</td></tr>
                <tr><td>&lt;div&gt;</td>	    <td>Block</td>	        <td>Elemento contenedor, crea una nueva línea antes y después de él.</td></tr>
                <tr><td>&lt;p&gt;</td>	        <td>Block</td>	        <td>Representa un párrafo de texto.</td></tr>
                <tr><td>&lt;h1 - h6&gt;</td>	<td>Block</td>	        <td>Encabezados de diferentes niveles, crean una nueva línea.</td></tr>
                <tr><td>&lt;section&gt;</td>	<td>Block</td>	        <td>Define secciones dentro de un documento.</td></tr>
                <tr><td>&lt;article&gt;</td>	<td>Block</td>	        <td>Representa un artículo o contenido independiente.</td></tr>
                <tr><td>&lt;header&gt;</td>	<td>Block</td>	        <td>Define un encabezado para una sección o documento.</td></tr>
                <tr><td>&lt;footer&gt;</td>	<td>Block</td>	        <td>Define el pie de página para un documento o sección.</td></tr>
                <tr><td>&lt;ul&gt;</td>	    <td>Block</td>	        <td>Lista no ordenada, crea una nueva línea para cada lista.</td></tr>
                <tr><td>&lt;ol&gt;</td>	    <td>Block</td>	        <td>Lista ordenada.</td></tr>
                <tr><td>&lt;li&gt;</td>	    <td>Block</td>	        <td>Elemento de lista, por lo general dentro de &lt;ul&gt; o &lt;ol&gt;.</td></tr>
                <tr><td>&lt;table&gt;</td>	    <td>Block</td>	        <td>Crea una tabla.</td></tr>
                <tr><td>&lt;tr&gt;</td>	    <td>Block</td>	        <td>Fila dentro de una tabla.</td></tr>
                <tr><td>&lt;td&gt;</td>	    <td>Block</td>	        <td>Celda dentro de una fila en la tabla.</td></tr>
                <tr><td>&lt;form&gt;</td>	    <td>Block</td>	        <td>Crea un formulario para la entrada de datos.</td></tr>
                <tr><td>&lt;input&gt;</td>	    <td>Inline</td>	        <td>Campo de entrada de datos, generalmente dentro de un formulario.</td></tr>
                <tr><td>&lt;span&gt;</td>	    <td>Inline</td>	        <td>Contenedor en línea, no afecta el flujo del documento.</td></tr>
                <tr><td>&lt;a&gt;</td>	        <td>Inline</td>	        <td>Enlace o hipervínculo.</td></tr>
                <tr><td>&lt;strong&gt;</td>	<td>Inline</td>	        <td>Resalta el texto, generalmente en negrita.</td></tr>
                <tr><td>&lt;em&gt;</td>	    <td>Inline</td>	        <td>Resalta el texto, generalmente en cursiva.</td></tr>
                <tr><td>&lt;img&gt;</td>	    <td>Inline</td>	        <td>Elemento de imagen, no genera un salto de línea.</td></tr>
                <tr><td>&lt;br&gt;</td>	    <td>Inline</td>	        <td>Salto de línea dentro de un bloque.</td></tr>
                <tr><td>&lt;code&gt;</td>	    <td>Inline</td>	        <td>Representa un fragmento de código.</td></tr>
                <tr><td>&lt;i&gt;</td>	        <td>Inline</td>	        <td>Representa un texto en cursiva, semánticamente enfatizado.</td></tr>
                <tr><td>&lt;b&gt;</td>	        <td>Inline</td>	        <td>Representa un texto en negrita, semánticamente enfatizado.</td></tr>
                <tr><td>&lt;time&gt;</td>	    <td>Inline</td>	        <td>Representa una fecha o un intervalo de tiempo.</td></tr>
                <tr><td>&lt;mark&gt;</td>	    <td>Inline</td>	        <td>Resalta el texto marcado.</td></tr>
                <tr><td>&lt;small&gt;</td>	    <td>Inline</td>	        <td>Representa texto de menor importancia.</td></tr>
                <tr><td>&lt;ins&gt;</td>	    <td>Inline</td>	        <td>Marca texto insertado.</td></tr>
                <tr><td>&lt;del&gt;</td>	    <td>Inline</td>	        <td>Marca texto borrado.</td></tr>
                <tr><td>&lt;label&gt;</td>	    <td>Inline</td>	        <td>Asocia una etiqueta con un control de formulario.</td></tr>
                <tr><td>&lt;button&gt;</td>	    <td>Inlineblock</td>    <td>Botón de formulario que puede tener contenido en línea o en bloque.</td></tr>
                <tr><td>&lt;iframe&gt;</td>	    <td>Block</td>	        <td>Muestra un documento dentro de una página web.</td></tr>
                <tr><td>&lt;canvas&gt;</td>	    <td>Block</td>	        <td>Área donde se pueden dibujar gráficos o animaciones.</td></tr>
                <tr><td>&lt;video&gt;</td>	    <td>Block</td>	        <td>Reproductor de video.</td></tr>
                <tr><td>&lt;audio&gt;</td>	    <td>Block</td>	        <td>Reproductor de audio.</td></tr>
            </table>
        </div>
        <p style="page-break-after: never;">
        <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, eveniet voluptatem. Veniam voluptatibus aut, ad minima molestiae laborum eum totam laboriosam placeat modi facere dolorum ratione fuga repudiandae vero eligendi.
        Eaque itaque quisquam voluptates quam, maiores nisi asperiores ut suscipit vitae fugiat, velit beatae eligendi quos soluta perferendis magnam adipisci inventore incidunt repudiandae doloribus quod! Debitis et necessitatibus accusamus soluta?
        Placeat minus necessitatibus enim sed ex perspiciatis iusto fugiat voluptate, debitis tempora ipsa dolorum eaque magnam quo et consequuntur autem corporis quae labore velit amet expedita quibusdam dolorem repellendus. Necessitatibus.</p>
    </main>
</body>
</html>
