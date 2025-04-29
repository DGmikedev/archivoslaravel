
<html lang="es">

    <table  style="width:100%; border:1px solid #aeb6bf">
        <tr height="100px"
            style="text-align:left;
                   font-size: 9px;
                   background-color:#d6dbdf;
  
        ">

        {{ $t ="Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem consectetur eos quae, qui voluptate doloribus iusto quos. At provident alias harum expedita eius! Laborum, molestias. Odit odio ipsa error optio!
        Temporibus non porro excepturi voluptate recusandae doloribus labore. A laudantium aliquam vitae dolor alias numquam, necessitatibus distinctio omnis neque. Dignissimos, voluptatibus. Aliquam mollitia excepturi perspiciatis nobis eum repudiandae expedita aperiam.
        Voluptatum consequatur similique, tenetur inventore repellat distinctio nihil architecto delectus doloribus libero veritatis esse? Doloribus dignissimos adipisci odit. Quisquam, quos impedit! Commodi accusantium atque nisi, recusandae fuga fugiat deleniti molestiae!
        Repellendus quidem mollitia alias itaque eligendi distinctio sunt, voluptatem tenetur voluptas ipsum corrupti aperiam officiis reiciendis numquam optio cum! Illum sapiente veritatis tenetur repudiandae iusto rem quibusdam eaque, ipsam cumque.
        Reprehenderit, quaerat explicabo quas illo facere repellat assumenda, tempora recusandae commodi reiciendis hic, eum blanditiis esse delectus quam ad ducimus ab. Tenetur, natus! Corporis deleniti numquam, voluptates culpa nam delectus?";

        echo count($t);
        }}
          <td width="7%"  >Id </td>
          <td width="7%"  >Cantidad</td>
          <td width="10%" >Unidad</td>
          <td width="56%" >Descripción</td>
          <td width="10%" >Valor unitario</td>
          <td width="10%" >Importe</td>
        </tr>
        {!! $body !!}
      </table>

</html>