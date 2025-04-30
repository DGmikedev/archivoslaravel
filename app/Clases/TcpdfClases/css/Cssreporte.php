<?php

namespace App\Clases\TcpdfClases\css;

class Cssreporte{

    public function estilo_header(){
        
        $css = '

            .titulo{ 
                color:#34495e;
            }

            .subtitulo{
                color: #85929e; 
            }
            .ltr_pequenia{
                font-size:12px;
            }
        ';

        return $css;
    }

    public function estilo_ventas(){

        $css = '

            .titulo{ 
                color:#fff;
            }

            .subtitulo{
                color:#ffffff; 
            }
            .ltr_pequenia{
                font-size:12px;
            }
            .tbl_verde{
                padding: 5px;
                background-color:#eafaf1;
            }
            .paragraph{
                color:black;
            }
        ';

        return $css;

    }

}




