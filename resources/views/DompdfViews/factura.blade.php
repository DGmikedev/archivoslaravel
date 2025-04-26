<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data[0] }}</title>
</head>
<style>
  /*
  #5dade2 -- azul
  #d6eaf8 -- azul calro
  */
  :root{

    /** Colors - Temas **/
    --color-contraste: white;       /* Cuando se use el color para resaltar este colro en fuente*/
    --color-resaltar:  #ec7063;     /* Cunado algo se requiera resaltar */  /* opc #d5d8dc; */
    --color-resaltar-lght: #fadbd8; /* Cuando se requira dar seguimiento al resaltado pero en diferencia al mismo*/
    --color-back-gral: #ffffff;     /* Color de fondo del documento */  


    /** Tamaños de letras **/
    --grande: 13px;  /* Nombres y datos relevantes eje: No de Factura, RFC  */
    --mediana: 11px;  /* Descripciones */
    --chica:9px;     /* Descripciones largas que requieren estar ahí, las letras chiquitas */
    --mini: 8px;     /* Letras muy pequeñas */

    /** Fuentes **/
    --fonnt-gral: monospace;  /*  monospace  */

    /** Fuerzas de fuente **/
    --negrita: bold;
    --cursiva: italic;

    /* Alineacion */
    --zqiuerda: left;
    --derecha: right; 
    --centro: center;

    /* Delimitción del documento */
    --margen-doc: 0.25cm;
    --padding-doc: 0.3cm;

    

  }

  html{
    margin: var(--margen-doc);
    
    font-family: var(--fonnt-gral);
  }

  body{
    background-color: var(--color-back-gral);
    padding: var(--padding-doc);
  }

  .resaltado{
    background-color: var(--color-resaltar);
    color: var(--color-contraste);
  }

  .tbl-linea-normal{
    border: 1px solid black;
    border-collapse: collapse;
  }

  .tbl-linea-resaltado{
    border: 1px solid var(--color-resaltar);
    border-collapse: collapse;
  }
  .tr-contenido{
    height:400px;
  }

  footer {
            position:fixed;
            bottom: 0.1cm;
            left: .25cm;
            right: 0.25cm;
            height: 9.5cm;
            text-align: center;
            /* line-height: 0.5cm; */
        }
  header{
    position:fixed;
            bottom: 19cm;
            left: .25cm;
            right: 0.25cm;
            height: 10cm;
            text-align: center;
  }


  .cuerpo{
    position:fixed;
    bottom: 12.8cm;
    left: .25cm;
    right: 0.25cm;
    height: 10cm;    
    text-align: center;
  }

  .page-break {
      page-break-before: always;
    }
    .contenedor_body{
      height: 1200px;
    }
</style>
<body>

<header>
  <table width="100%" style="border-bottom:2px solid var(--color-resaltar);">
    <tr>
      <td width="20%" style="text-align:center">LOGO</td>
      <td width="10%" style="text-align:center"></td>
      
      <td width="70%">
        
        <span 
          style="font-size:var(--grande);
                 font-weight: var(--negrita);
                 text-align:left;
          ">  
          JUAN HERNANDEZ GOMÉZ   <br>
        </span>

        <span style="font-size:var(--mediana);">  
        <span style="font-weight: var(--negrita);">RFC: HSJUCND456TY</span><br> 
          Calle falsa 123 <br>
          Col Falsa CP 12365 <br>
          Ciudad de México, México, Tel: 12595632542 <br>
          Correo eléctronico: mi_correo@mail.com <br>
          Regimen fiscal: 612 - Persona fisica con actividades empresariales y profesionales.
      </td>
    </tr>
  </table>

  <table width="100%" >
    <tr>
      <td width="75%"></td>
      <td width="25%" 
          class="resaltado" 
          style=" font-size:var(--mediana); 
                   text-align:right;
      ">
        TIPO DE COMPROBNTE:<span style="font-weight: var(--negrita);" >INGRESO</span>
      </td>
    </tr>
  </table>

  <table width="100%">

    <tr class="resaltado" style=" font-size:var(--mediana); ">

      <td width="70%">DATOS CLIENTE\RECEPTOR:</td>

      <td width="30%" style=" text-align:right; "> 

          FACTURA NUMERO: <span style=" font-weight:var(--negrita); ">12652548125</span>

      </td>
    </tr>
    <tr style=" font-size:var(--mediana); ">

      <td width="70%">
        <span style="font-weight: var(--negrita); font-size:var(--grande);">  OSCAR GIL GOMÉZ SANCHEZ  </span> <br>
        <span style="font-weight: var(--negrita); font-size:var(--mediana);"> RFC: DFGVB9987890 </span> <br>
        <span style="font-size:var(--chica);">  Calle falsa 123
          Col Falsa CP 12365 Ciudad de México<br>
          USO DE CFDI: G03 - Gastos en general <br>
          Tel: 12595632542
        </span>
      </td>

      <td width="30%" style=" text-align:right; "> 

        <!-- inicia Pequeña tabla -->
        <table width="100%" style="font-size:var(--chica);">
          <tr>
            <td style="background-color:var(--color-resaltar-lght);">LUGAR Y FECHA DE EXPEDICIÓN:</td>
          </tr>
          <tr>
            <td >CP: 05200  13/02/2023 13:00:00 </td>
          </tr>
          <tr>
            <td style="background-color:var(--color-resaltar-lght);">FECHA Y HORA DE EMISIÓN:</td>
          </tr>
          <tr>
            <td > 13/02/2023 13:00:00</td>
          </tr>
        </table>
        <!-- fin Pequeña tabla -->

      </td>
    </tr>
  </table>

  <table class="tbl-cliente"  width="100%">
    <tr class="resaltado" 
        style="text-align:center;
               font-size:var(--chica);
      ">

      <td style=" width:25%;" >Numero de serie de SCD del emisor:</td>
      <td style=" width:25%;" >Folio Fiscal/ UUID</td>
      <td style=" width:25%;">Numero de serie del SCD del SAT</td>
      <td style=" width:25%;">Fecha y hora de certificación</td>
    </tr>
    <tr 
      style="
        text-align:center;
        background-color:var(--color-resaltar-lght);
        font-size: var(--chica);
      " >
      <td style=" width:25%;" >9ERCR-R267643GV-F34D784-11SDFC</td>
      <td style=" width:25%;" >3DDFR-DFR234FGV-FGTH784-45RFTG</td>
      <td style=" width:25%;">30001000000400002495</td>
      <td style=" width:25%;">2023-10-03T17:42:30</td>
    </tr>
  </table>

</header>

<div class="cuerpo">
  <div class="tbl-linea-resaltado" style="height:490px;" >
    <table  width="100%;">
      <tr class="resaltado tr-contenido" height="100px"
          style="text-align:left;
                 font-size: var(--chica);

      ">
        <td width="7%" >Id </td>
        <td width="7%" >Cantidad</td>
        <td width="10%" >Unidad</td>
        <td width="56%" >Descripción</td>
        <td width="10%" >Valor unitario</td>
        <td width="10%" >Importe</td>
      </tr>
      @for($i=0; $i<2; $i++)
      <tr style=" text-align:left; font-size: var(--mediana); vertical-align:top;" class="contenedor_body">
          <td style="padding-top:10px; padding-left:5px;"  width="7%" >{{ $i }} </td>
          <td style="padding-top:10px"  width="7%" >100</td>
          <td style="padding-top:10px"  width="10%">pieza</td>
          <td style="padding-top:10px"  width="46%">Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem laborum at voluptates dignissimos provident doloremque repudiandae reiciendis quasi accusantium aliquid? Nesciunt nihil fuga maxime necessitatibus molestias esse aspernatur nostrum alias. </td>
          <td style="padding-top:10px"  width="15%">$15,000</td>
          <td style="padding-top:10px; padding-rigth:5px;"  width="15%">$ 1,300,000.00</td>
      </tr>
      @endfor
    </table>
  </div>

  <br>

</div>

<footer>
  <table class="tbl-linea-resaltado" width="100%" >
    <tr>
      <td class=" resaltado " 
          colspan="4" 
          
          style=" font-size:var(--chica)" 
      >
        Información del comprobante
    </td>
    </tr>
    <tr   style="background-color:var(--color-resaltar-lght); text-align:left; font-size: var(--chica); height:200px; vertical-align:top;">
      <td style="padding:5px;" width="37%" >Forma de pago:</td>
      <td style="padding:5px;" width="37%" >Método de pago:</td>
      <td style="padding:5px;" width="13%" >Subtotal</td>
      <td style="padding:5px; font-weight:var(--negrita)" width="13%" >$75,000.00</td>
    </tr>
    <tr class="" style=" text-align:left; font-size: var(--chica); height:200px; vertical-align:top;">
      <td style="padding:5px;" width="37%" >01 - Efectivo</td>
      <td style="padding:5px;" width="37%" >PUE - Pago en una sola exhibición</td>
      <td style="padding:5px;" width="13%" >I.V.A 16%</td>
      <td style="padding:5px;" width="13%" > $1,200.00 </td>
    </tr>
    <tr  style=" text-align:left; font-size: var(--chica); height:200px; vertical-align:top;">
      <td style="padding:5px;" width="37%" >Condiciones de pago: Institución Bancaria delEmisor: </td>
      <td style="padding:5px;" width="37%" >BBVA BANCOMER No. de Cuenta: 0121800017432651254</td>
      <td style="padding:5px;" width="13%" >TOTAL</td>
      <td style="padding:5px;" width="13%" > $87,000.00</td>
    </tr>
    <tr  style=" text-align:left; font-size: var(--chica); height:200px; vertical-align:top;">
      <td style="padding:5px;" width="37%" >Exportación: 01 - No aplica </td>
      <td style="padding:5px;" width="37%" >Moneda: MXN &nbsp;&nbsp;&nbsp; Tipo de cambio $1,000.00</td>
      <td style="padding:5px;" width="13%" ></td>
      <td style="padding:5px;" width="13%" > </td>
    </tr>
    <tr  style=" text-align:left; font-size: var(--chica); height:200px; vertical-align:top;">
      <td style="padding:5px;" width="37%" colspan="4" >OCHO MIL SETECIENTOS PESOS 00/100 M.N</td>
    </tr>
    <tr  style=" text-align:left; font-size: var(--chica); height:200px; vertical-align:top;">
      <td style="padding:5px;" width="37%" colspan="4" >Observaciones: &nbsp; sin-observaciones</td>
    </tr>
  </table>
 
  <table width="100%">
    <tr class=" resaltado "  style=" font-size:var(--chica)" >
      <td width="80%">CADENA ORIGINAL DEL COMPLEMENTO DE CERTIFÍCACIÓN ORIGINAL DEL SAT</td>
      <td width="20%" style=" text-align:center " >Código QR</td>
    </tr>
    <tr>
      <td style="font-size:var(--mini);" > Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum rem, laborum blanditiis eos eligendi hic fugit earum amet, iste, beatae maxime. Assumenda consectetur aliquid laudantium, quaerat reiciendis suscipit similique temporibus.Sunt dignissimos beatae praesentium perspiciatis dolorem quibusdam, explicabo iusto debitis, tenetur veniam cumque incidunt architecto ullam voluptates corrupti harum laboriosam in aspernatur itaque. Aspernatur, porro illo itaque provident quae eum!</td>
      <td rowspan="5" style="text-align:center">QR-CODE</td>
    </tr>
    <tr>
      <td class=" resaltado "  style=" font-size:var(--chica)" width="80%">SELLO DIGITAL DEL EMISOR:</td>

    </tr>
    <tr>
      <td style="font-size:var(--mini);" > Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor laborum labore itaque voluptates ducimus quibusdam, tempore repudiandae delectus repellendus obcaecati, ex quae cupiditate! Eos dicta reiciendis dolorem cum adipisci. Unde!Itaque in unde expedita harum culpa magni! Aliquid sint et laboriosam quidem nesciunt explicabo est natus placeat quos, facilis doloremque in deleniti libero unde sapiente nam necessitatibus dicta minima rem.</td>

    </tr>
    <tr >
      <td class=" resaltado "  style=" font-size:var(--chica)" width="80%">SELLO DIGITAL DEL SAT:</td>

    </tr>
    <tr>
      <td style="font-size:var(--mini);" > Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos fugiat provident consequuntur. Reiciendis fugit voluptatibus necessitatibus placeat ex cum inventore quisquam ducimus eaque reprehenderit similique soluta est culpa, temporibus esse?Vitae numquam reiciendis, repudiandae ratione ea vero enim dignissimos quos quae nihil illum aut accusantium necessitatibus temporibus voluptatum eaque laborum deserunt a. Perferendis odit fuga exercitationem ea ad dicta natus?</td>

    </tr>
  </table>

  <hr style="color:var(--color-resaltar);"> 
  <table width="100%" style="font-size:var(--mini); text-align:center;">
    <tr>
      <td colspan="3">RFC del proveedor de certificación: SPR 190361354 &nbsp;&nbsp; ESTE DOCUEMNTO ES UNA REPRESENTACIÓN IMPRESA DE UN CFDI &nbsp;&nbsp;Version del CFDI: 4.0</td>
    </tr>
    <tr>
      <td colspan="3">CFDI Certíficado por: EMPRESA QUE FACTURA EN MÉXICO  y Generado desde: www.mipaginadefacturacion.com Proveedor Autorizdo de Certidicación: No 55555io</td>
    </tr>
    <tr>
      <td>Centros de Atención de Empresa que factura:</td>
      <td colspan="2"> Centro de Ateción CDMX: 555222-55598, 1526325478 &nbsp;&nbsp; Interior del país: 800-123-654  </td>
    </tr>
  </table>
</footer>
</body>
</html>