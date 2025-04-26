<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>SERVICIOS | GENERA PAGO</title>
</head>

<style>

    :root{
        --color-destacado:  #e74c3c;
        --color-grs-destacar: #ebedef;
        --tamanio-text-general: 12px
    }
   /* Texto de uso en forma general del PDF   tbl_left txt_body */
   .txt_body{
        font-size: var(--tamanio-text-general);
    }

    .tbl_left{   
        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 5px;
        padding-right: 5px;
        width:100%;
        text-align: left;
        border:collapse;
        border-top: 1px var(--color-destacado) solid;
        ;
    }

    .color_denotar{
        background-color: var(--color-grs-destacar);
    }

    .ltrs_rosas{
        color: var(--color-destacado);
    }

    .mensaje{
    text-align: center;
    font-size:11px;
}
.minimensaje{
    text-align: center;
    font-size:8px;
}
.table_snborde{
    width:100%;
    border: 0px solid;
    border-color: #ebedef;
    text-align:center;
}
.rodea_centra{
    border-top:    1px solid  #abb2b9 ;
    border-left:   1px solid  #abb2b9 ;
    border-right:  1px solid  #abb2b9 ;
    border-bottom: 1px solid  #abb2b9 ;
    text-align: center;
    paading:1px;
}
.rodea_izquierda{
    border-top:    1px solid  #abb2b9 ;
    border-left:   1px solid  #abb2b9 ;
    border-right:  1px solid  #abb2b9 ;
    border-bottom: 1px solid  #abb2b9 ;
    text-align: left;
    paading:1px;
}
html{
    padding:12px;
}

</style>
<body>
    <table class="table_snborde">
        <tr>
          <td> <p> <img src="{{ asset('imgs/logo1.png')  }}" width="120px" height="65px" > </p></td>
          <td><span class="ltrs_rosas">
            SECRETARÍA DE PLANEACIÓN, FINANZAS Y ADMINISTRACIÓN<br>
            DEL GOBIERNO DEL ESTADO DE PUEBLA</span> <br>
            ORDEN DE COBRO
          </td>
          <td> <img src="{{ asset('imgs/logo2.png')  }}" width="60px" height="80px" ></td>
        </tr>
      </table>

    <table class=" tbl_left txt_body">
        <tr>
          <td>NOMBRE DEL CONTRIBUYENTE:</td>
          <td> {{ $data['_fullname'] }}</td>
          <td>FOLIO DE SEGUIMIENTO:</td>
          <td> {{ $data['_folioseguimiento'] }} </td>
        </tr>
        <tr>
          <td>RFC:</td>
          <td> {{ $data['_rfc']  }}</td>
          <td>CURP:</td>
          <td> {{ $data['_curp'] }}</td>
        </tr>
        <tr>
          <td>DESCRIPCIÓN DEL SERVICIO:</td>
          <td>{{ $data['_descservicio']  }}</td>
          <td>NO. DE MOVIMIENTOS:</td>
          <td> {{ $data['_movs'] }}</td>
        </tr>
        <tr>
          <td>VIGENCIA DE LA REFERENCIA:</td>
          <td> {{ $data['_vigenciareferencia'] }}</td>
          <td>EMISIÓN DE LA REFERENCIA:</td>
          <td> {{ $data['_folioseguimiento'] }}</td>
        </tr>
      </table>

    <table class="tbl_left txt_body color_denotar">
        <tr>
            <td>Importe con letra: MIL DOSCIENTO SESENTA PESOS 00/100 MXN</td>
            <td>NO. DE MOVIMIENTOS: $ 1,260.00</td>
        </tr>
    </table>

    <table class="tbl_left txt_body color_denotar">
        <tr>
          <td>CONCEPTO DE PAGO SPEI:</td>
          <td>13525146337745399268</td>
          <td rowspan="3">
            <img src="{{ asset('imgs/LOGOSPEI.png') }}" width="80px" height="30px"   alt="logo3">
          </td>
        </tr>
        <tr>
          <td>REFERENCIA SPEI:</td>
          <td>0671517</td>
        </tr>
        <tr>
          <td>BANCO BENEFICIARIO O DESTINO:</td>
          <td>BBVA | GOBIERNO DEL ESTADO DE PUEBLA</td>
        </tr>

        <tr>
          <td>CUENTA CLABE BENEFICIARIA O DESTINO:</td>
          <td>012914002006715170</td>
          
        </tr>

    </table>
    <table class="tbl_left" style="padding:2px" >
        <tr>
          <td class="mensaje">Puede realizar su pago en las siguientes instituciones, el cual generará un costo por comisión, que se da a conocer en las columnas de comisión
          </td>
        </tr>
    </table>
    <table
        style=" 
        width:100%; 
        border: 1px solid #ebedef;
        border-collapse: collapse;
        font-size: 11px;
        "
    >
        <tr>
            <td class="ltrs_rosas rodea_centra" rowspan="3">NOMBRE DE LA INSTITUCIÓN</td>
            <td class="ltrs_rosas rodea_centra" rowspan="3">NÚMERO DE
                CONVENIO</td>
            <td class="ltrs_rosas rodea_centra" colspan="5">MONTO DE LA COMISIÓN</td>
        </tr>
        <tr>
            <td rowspan="2"class="ltrs_rosas rodea_centra">CAJEROS AUTOMÁTICOS</td>
            <td rowspan="2"class="ltrs_rosas rodea_centra">VENTANILLA</td>
            <td rowspan="2"class="ltrs_rosas rodea_centra">CARGO A CUENTA DE CHEQUES</td>
            <td colspan="2" class="ltrs_rosas rodea_centra">PAGOS DE SERVICIOS:</td>
        </tr>
        <tr>
            <td class="ltrs_rosas rodea_centra">BANCA ELECTRÓNICA</td>
            <td class="ltrs_rosas rodea_centra">BANCA MÓVIL</td>
        </tr>
  
        @foreach($instituciones as $e)
        <tr>
            <td class="rodea_centra">{{ $e[0] }}</td>
            <td class="rodea_izquierda">{{ $e[1]}} </td>
            <td class="rodea_izquierda">{{ $e[2]}} </td>
            <td class="rodea_izquierda">{{ $e[3]}} </td>
            <td class="rodea_izquierda">{{ $e[4]}} </td>
            <td class="rodea_izquierda">{{ $e[5]}} </td>
            <td class="rodea_izquierda">{{ $e[6]}} </td>
        </tr>
        @endforeach
        <tr>
            <td class="rodea_centra">{{ $financiera[0] }}</td>
            <td class="mensaje rodea_izquierda" colspan="6">{{ $financiera[1] }}</td>
        </tr>
    </table>
    <table class="minimensaje" style="text-align: left;">
        <tr><td>(*) Sin costo para clientes de Citibanamex</td></tr>
        <tr><td>También puede realizar el pago en estos sitios con una comisión máxima de $ 12.00 mas IVA.</td></tr>
    </table>
    <table style="width:100%">
        <tr>
        <td>
            <img src="{{ asset('imgs/cintillo.png')  }}" width="100%" height="90px" >
        </td>
        </tr>
    </table>

    <table width="100%" style=" border-bottom: 1px #c0392b solid " >
        <tr>
            <td class="ltrs_rosas" style=" font-size:10px; text-align:center;">
                EVITE REALIZAR EL PAGO DE ESTA ORDEN DE COBRO EN INSTITUCIONES QUE NO SE CITEN EN ESTE DOCUMENTO
            </td>
        </tr>
    </table>

    <table style="border-bottom: 1px #c0392b solid; width:100%">
        <tr 
        class="txt_body"
        style="
            font-size: 10px;
        "
        >
            <td>ESTIMADO CONTRIBUYENTE:</td>
        </tr>
        <tr class="color_denotar" 
        style="
        font-size: 10px;

        "
        >
            <td>
                1) REVISE QUE LOS DATOS AQUÍ ASENTADOS SEAN CORRECTOS ANTES DE REALIZAR SU PAGO. 2) EL NÚMERO DE REFERENCIA, CONVENIO E IMPORTE SON INDISPENSABLES PARA REALIZAR
                SU PAGO EN INSTITUCIONES BANCARIAS. 3) ANTES DE SALIR DEL LUGAR DONDE REALIZÓ SU PAGO, REVISE QUE LA REFERENCIA, EL CONVENIO Y EL MONTO IMPRESOS EN EL COMPROBANTE
                QUE SE LE EXPIDA SEAN CORRECTOS. 4) DOS DÍAS HÁBILES DESPUÉS DE HABER REALIZADO SU PAGO PODRÁ IMPRIMIR SU COMPROBANTE FISCAL ELECTRÓNICO EN LA PÁGINA
                https://rl.puebla.gob.mx CONSULTANDO SU REFERENCIA. 5) AL REALIZAR SU PAGO CON TARJETA DE CRÉDITO O DÉBITO A TRAVÉS DEL PORTAL DE LA SECRETARÍA DE PLANEACIÓN Y FINANZAS,
                OBTENDRÁ EL COMPROBANTE FISCAL DE FORMA INMEDIATA. 6) PARA REALIZAR SU PAGO SPEI REFERENCIADO, ES NECESARIO QUE EN SU BANCA ELECTRÓNICA:
                - Capture exactamente el concepto del pago tal y como está mostrado en esta orden de cobro (20 dígitos) sin dejar espacios.
                - Registre la CLABE y banco beneficiario o destino con los datos mostrados en este formato antes de intentar el pago.
                - Que el importe a pagar se capture exactamente como está especificado en esta orden.</td>
        </tr>
    </table>

    <table width="100%">
        <tr>
            <td>
                <img src="{{ asset('imgs/cintillo2.png') }}"  width="100%" height="95px" alt="">
            </td>
        </tr>
    </table>

    
    
</body>
</html>