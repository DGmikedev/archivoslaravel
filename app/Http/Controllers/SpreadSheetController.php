<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clases\PphOffice\phpSpreadsheet\HojaExcel;
use App\Clases\PphOffice\phpSpreadsheet\CatGraficoSpreadSheet;

class SpreadSheetController extends Controller
{
    public function catalogo(){

        $titulo = "Ventas por mes";

            $datos = [
                ['', 'ENERO', 'FEBERRO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBER', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'],
                ['Producto A', 10, 20, 30, 35, 20, 40, 20, 60, 30, 10, 30, 20 ],
                ['Producto B', 15, 25, 35, 10, 5, 30, 20, 80, 10, 15, 20, 12 ],
            ];

            $poscicion_grafico = ['B5', 'P19'];
            $poscicionSeries   = ['C2', 'O2'];
            $poscicionDatos    = ['D3', 'O3'];
            $poscicionDatos2   = ['D4', 'O4'];

        $linea = new CatGraficoSpreadSheet();

        return $linea->catalogo($titulo, $datos, $poscicion_grafico);


    }

    /*
        $datos = [ ['B6', 'MES'],['C6', 'CANTIDAD'], // titulos de columnas

                        ['B7', 'ENERO'],['B8', 'FEBERRO'],['B9', 'MARZO'],['B10', 'ABRIL'],['B11', 'MAYO'], // Meses
                        ['B12', 'JUNIO'],['B13', 'JULIO'],['B14', 'AGOSTO'],['B15', 'SEPTIEMBER'],
                        ['B16', 'OCTUBRE'],['B17', 'NOVIEMBRE'],['B18', 'DICIEMBRE'],

                        ['C7', 50],['C8', 10],['C9', 30],['C10',20],['C11',50],['C12',10],   // Valores por mes
                        ['C13',60],['C14',20],['C15',40],['C16',30],['C17',10],['C18',20]  
                    ];
*/

    public function excel(){

        $xcel = new HojaExcel();

        $cabeceras = [
            ['A1','ID'],
            ['B1','Nombre completo'],
            ['C1','Fecha de nacimiento'],
            ['D1','Dirección'],
            ['E1','Localidad y Código postal'],
            ['F1','Teléfono'],
            ['G1','Correo electrónico'],
            ['H1','Fecha de alta'],
            ['I1','Grupo de clientes']];

        $datos = [
            ['C0001', 'Leandra Anna Malo Alba','08/12/1984',"7943 S. Fifth Street","Bergenfield, NJ 07621",'(598) 451-5865', 'uraeus@mac.com','19/01/12 14:32','A'],
            ['C0002', 'Severo Granados Iglesia','12/08/1986',"77 Lyme Street","Hermitage, TN 37076",'(869) 771-1487', 'bhima@me.com','22/03/05 15:42','E'],
            ['C0003', 'Lucho Andreu Amat','16/04/1990',"9448 Fairfield St.","Aberdeen, SD 57401",'(246) 245-7306', 'psichel@sbcglobal.net','15/09/07 03:01','E'],
            ['C0004', 'Matías Mauricio Castillo Barrera','02/12/1996',"8143 College St.","Trussville, AL 35173",'(707) 933-2513', 'tbeck@optonline.net','07/12/11 15:22','E'],
            ['C0005', 'Mauricio Guijarro Castelló','14/05/1984',"9893 W. Vale Ave.","Billings, MT 59101",'(612) 325-0216', 'eegsa@yahoo.ca','28/06/08 06:58','D'],
            ['C0006', 'Isaura Leyre Avilés Pelayo','18/04/1987',"8094 Albany Drive","Poughkeepsie, NY 12601",'(992) 564-5230', 'barlow@verizon.net','26/04/08 20:18','E'],
            ['C0007', 'Soraya Morera-Lago','27/11/1990',"9001 Creek Street","Lawrence, MA 01841",'(651) 544-1246', 'wkrebs@me.com','08/10/19 16:04','A'],
            ['C0008', 'Victoriano Tapia-Cabanillas','06/03/1981',"57 Green Drive","Fair Lawn, NJ 07410",'(851) 782-6044', 'dleconte@outlook.com','16/08/09 08:37','C'],
            ['C0009', 'Nidia Saez Campoy','28/04/1980',"86 Surrey St.","Kennewick, WA 99337",'(265) 609-6654', 'flakeg@verizon.net','05/01/13 21:49','B'],
            ['C0010', 'Teófila Villanueva Molina','04/01/1987',"8728 Boston Street","Rego Park, NY 11374",'(305) 491-4988', 'slaff@icloud.com','29/12/07 03:29','E'],
            ['C0011', 'Trini de Alberdi','04/12/1990',"45 Heritage Ave.","Fall River, MA 02720",'(561) 649-7485', 'uncle@hotmail.com','27/08/13 18:19','B'],
            ['C0012', 'Dani Baena','20/10/1977',"9334 Hillside Street","Grand Blanc, MI 48439",'(966) 735-9451', 'vsprintf@hotmail.com','24/02/12 00:45','C'],
            ['C0013', 'Angelina de Arregui','21/02/2000',"611 Academy Street","Dalton, GA 30721",'(711) 282-2848', 'chinthaka@yahoo.ca','24/12/14 11:02','D'],
            ['C0014', 'Samuel de Carranza','16/05/1999',"7201 Mill Street","Marcus Hook, PA 19061",'(337) 397-0627', 'ntegrity@optonline.net','29/10/16 06:44','C'],
            ['C0015', 'Jacinta Montenegro Garcés','13/03/1994',"59 Ridgewood Ave.","Reynoldsburg, OH 43068",'(969) 383-4277', 'yangyan@yahoo.ca','06/04/07 06:15','D'],
            ['C0016', 'Lisandro Delgado Nadal','18/04/1980',"270 West Green Lake St.","Louisville, KY 40207",'(748) 495-1748', 'ilyaz@me.com','10/11/19 01:09','B'],
            ['C0017', 'Samanta Manjón Godoy','03/03/1980',"9481 S. Chestnut St.","Morristown, NJ 07960",'(494) 813-5651', 'njpayne@hotmail.com','18/01/17 14:05','C'],
            ['C0018', 'Albano Teodosio Cañete Rosa','04/04/1981',"7 N. Annadale Street","Eugene, OR 97402",'(779) 217-3175', 'ralamosm@gmail.com','12/05/10 03:57','C'],
            ['C0019', 'Abel Villanueva','12/06/1988',"88 Pheasant Rd.","Bridgeton, NJ 08302",'(904) 204-2255', 'bartak@sbcglobal.net','24/02/12 07:39','A'],
            ['C0020', 'Bienvenida Pulido Cózar','21/01/1994',"8 Galvin Street","Seymour, IN 47274",'(932) 307-3409', 'improv@me.com','16/05/16 09:09','D'],
            ['C0021', 'Patricio Manzano Pomares','01/07/1979',"9 Marconi Road","Eastpointe, MI 48021",'(993) 960-7653', 'arnold@live.com','16/02/18 13:16','D'],
            ['C0022', 'Modesto de Casares','13/12/1975',"8842 Old Van Dyke Ave.","Nanuet, NY 10954",'(611) 927-0572', 'ismail@comcast.net','26/02/19 09:13','D'],
            ['C0023', 'Berto del Morales','30/10/1987',"471 S. Cambridge Drive","Fairborn, OH 45324",'(283) 384-7846', 'wilsonpm@aol.com','19/02/05 02:21','A'],
            ['C0024', 'Nuria Daniela Jáuregui Tejero','02/07/1979',"9 Military Dr.","Yuba City, CA 95993",'(677) 875-1069', 'barjam@icloud.com','02/04/14 18:30','E'],
            ['C0025', 'Anastasia Pedrero Solera','29/08/1986',"8388 Pheasant Street","Powder Springs, GA 30127",'(886) 929-9282', 'michiel@msn.com','07/09/12 03:07','B'],
            ['C0026', 'Purificación Salomé Ferrán Valero','29/09/1984',"221 Dogwood Dr.","El Paso, TX 79930",'(596) 660-5408', 'gamma@hotmail.com','02/07/10 15:05','A'],
            ['C0027', 'Melania Cobos Lozano','15/04/1989',"911 Charles St.","East Lansing, MI 48823",'(768) 242-5793', 'dhrakar@live.com','08/05/19 12:01','C'],
            ['C0028', 'Evangelina Font Lago','26/03/1978',"176 Henry Smith Ave.","Westland, MI 48185",'(483) 388-3044', 'themer@icloud.com','20/11/13 20:03','C'],
            ['C0029', 'Otilia Mercader Jimenez','21/06/1986',"323 1st St.","Salt Lake City, UT 84119",'(525) 814-4351', 'leocharre@me.com','13/11/16 14:53','C'],
            ['C0030', 'Nadia Reyes-Bosch','14/03/1997',"8127 Pawnee Lane","Pikesville, MD 21208",'(872) 458-4785', 'kewley@icloud.com','28/05/13 12:57','B'],
            ['C0031', 'Mireia Córdoba Pi','21/10/1993',"7813 Helen Ave.","West Springfield, MA 01089",'(600) 318-8808', 'murdocj@mac.com','11/01/06 00:48','A'],
            ['C0032', 'Melisa Rueda Rosado','28/09/1970',"353 Canterbury Dr.","Mahwah, NJ 07430",'(437) 406-2974', 'webinc@msn.com','30/03/17 18:22','B'],
            ['C0033', 'Trini Sanabria-Frías','22/05/1989',"61 Addison Dr.","Park Forest, IL 60466",'(615) 712-3381', 'mrsam@yahoo.ca','19/01/17 19:23','D'],
            ['C0034', 'Lucía Manola Briones Jove','28/11/1993',"810 West Mill St.","Westfield, MA 01085",'(651) 742-1141', 'sassen@aol.com','07/02/15 19:05','B'],
            ['C0035', 'Natalio Pereira Barrio','19/09/1970',"51 Mayfair Court","Dothan, AL 36301",'(517) 690-8580', 'emmanuel@att.net','11/01/07 15:36','D'],
            ['C0036', 'Nerea Alcalde Solé','03/02/1984',"840 Oak Meadow Ave.","Klamath Falls, OR 97603",'(616) 766-2111', 'naoya@mac.com','17/08/06 09:46','B'],
            ['C0037', 'Gracia Goicoechea Alba','10/12/1980',"257 Pheasant Drive","Hialeah, FL 33010",'(685) 726-6159', 'slanglois@hotmail.com','23/03/21 13:49','E'],
            ['C0038', 'Toño Hidalgo Blázquez','24/11/1988',"30 N. Park Avenue","Howard Beach, NY 11414",'(737) 772-3449', 'improv@comcast.net','07/09/09 05:50','B'],
            ['C0039', 'Cándida Sedano Jiménez','16/04/1981',"850 School St.","Wheaton, IL 60187",'(876) 612-6879', 'noneme@me.com','14/05/11 08:38','E'],
            ['C0040', 'Eutimio Barreda Cobos','09/05/1999',"59 Atlantic Ave.","Gallatin, TN 37066",'(669) 791-3350', 'majordick@yahoo.com','05/01/09 00:19','C'],
            ['C0041', 'Rosario Yuste Falcón','24/06/1986',"74 Broadway","MILTON KEYNES",'(642) 368-4225', 'rgiersig@verizon.net','22/12/10 07:16','D'],
            ['C0042', 'Encarnacion Español Ocaña','25/03/1985',"MK9 3EN","21 Mill Road",'(953) 901-9132', 'smartfart@aol.com','06/11/20 06:49','C'],
            ['C0043', 'Magdalena Vilaplana Esteve','26/09/1991',"CREWE","CW90 4ZA",'(869) 720-8135', 'jmgomez@verizon.net','14/07/14 01:35','D'],
            ['C0044', 'Adelardo Novoa','12/06/1985',"674 High Street","CANTERBURY",'(319) 633-9396', 'msherr@yahoo.com','20/01/13 04:11','C'],
            ['C0045', 'Adoración Rovira Zabala','25/10/1977',"CT76 6OB","10 Richmond Road",'(731) 945-6687', 'keutzer@sbcglobal.net','30/03/06 09:15','D'],
            ['C0046', 'Ovidio Lamas','09/03/2000',"DUNDEE","DD84 2WJ",'(435) 742-6743', 'policies@sbcglobal.net','09/09/17 19:16','C'],
            ['C0047', 'Reyes Julián Nogués','07/04/1978',"35 The Crescent","SOUTH EAST LONDON",'(684) 330-1830', 'hwestiii@verizon.net','04/08/06 08:44','C'],
            ['C0048', 'Adoración Jurado Clemente','08/12/1976',"SE42 3UM","44 School Lane",'(843) 248-6284', 'hstiles@mac.com','04/10/07 17:41','E'],
            ['C0049', 'Plácido Zabala Feijoo','19/01/1979',"DONCASTER","DN36 9AT",'(390) 565-9213', 'xnormal@gmail.com','27/11/11 20:10','A'],
        ];

        $nombre = "UsuariosSistema";

        return $xcel->crearhoja($nombre, $cabeceras, $datos);

    }
}
