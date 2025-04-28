
<html lang="es">

    <table  style="width:100%; border:1px solid #aeb6bf">
        <tr height="100px"
            style="text-align:left;
                   font-size: 9px;
  
        ">
          <td width="7%" >Id </td>
          <td width="7%" >Cantidad</td>
          <td width="10%" >Unidad</td>
          <td width="56%" >Descripción</td>
          <td width="10%" >Valor unitario</td>
          <td width="10%" >Importe</td>
        </tr>
        @for($i=0; $i<15; $i++)
        <tr style=" text-align:left; font-size: 8px; vertical-align:top;">
            <td style="padding-top:10px; padding-left:5px;"  width="7%" >{{ $i }} </td>
            <td style="padding-top:10px"  width="7%" >100</td>
            <td style="padding-top:10px"  width="10%">pieza</td>
            <td style="padding-top:10px"  width="46%">Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem laborum at voluptates dignissimos provident doloremque repudiandae reiciendis quasi accusantium aliquid? Nesciunt nihil fuga maxime necessitatibus molestias esse aspernatur nostrum alias. </td>
            <td style="padding-top:10px"  width="15%">$15,000</td>
            <td style="padding-top:10px; padding-rigth:5px;"  width="15%">$ 1,300,000.00</td>
        </tr>
        @endfor
      </table>

</html>