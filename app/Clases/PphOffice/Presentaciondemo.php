<?php

namespace App\Clases\PphOffice;


use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\Style\Color;
use PhpOffice\PhpPresentation\Style\Alignment;
use PhpOffice\PhpPresentation\Style\Borders;
use PhpOffice\PhpPresentation\Style\Border;
use PhpOffice\PhpPresentation\Slide\Transition;
use PhpOffice\PhpPresentation\Shape\Drawing\Gd;
use PhpOffice\PhpPresentation\Shape\Group;
use PhpOffice\PhpPresentation\Shape\Line;
use PhpOffice\PhpPresentation\Shape\Drawing; // Clases que manejan las imagenes
use PhpOffice\PhpPresentation\Style\Fill;    // Clases que manejan las imagenes
use PhpOffice\PhpPresentation\Slide\Background\Color as BackgroundColor;
use App\Clases\ChartsHighcharts\ChartsHGC;

class Presentaciondemo
{

    public function crearppt(){

        // Se crea una nueva presentación
        $objPHPPresentation = new PhpPresentation();

        $objPHPPresentation->getDocumentProperties()->setCreator('PHPOffice')
            ->setLastModifiedBy('MDG Inc')
            ->setTitle('DEMO PHPOFFICE/PRESENTATION')
            ->setSubject('DEMO')
            ->setDescription('ADDIN DIFERENT TYPE OF SLIDES TO MAKE A PRESENTATION DEMO ')
            ->setKeywords('OFFICE 2007 OPEN XML LIBREOOFICE ODT PHP')
            ->setCategory('SAMPLE');

        // SE AJUSTA TRANSICIÓN 
        $oTransition = new Transition();
        $oTransition->setManualTrigger(false);
        $oTransition->setTimeTrigger(true, 4000);
        $oTransition->setTransitionType(Transition::TRANSITION_SPLIT_IN_VERTICAL);

        // Se crea la primer diapositiva
        $currentSlide = $objPHPPresentation->getActiveSlide();

        // Color de fondo   Color::COLOR_WHITE
        $background = new BackgroundColor();
        $background->setColor(new Color(Color::COLOR_GREENSOFT));
        $currentSlide->setBackground($background);

        $fill = new Fill();
        $fill->setFillType(Fill::FILL_SOLID)->setStartColor(new Color(Color::COLOR_DARKRED));


        // PRIMERA DIAPOSITIVA ( TITULO )

        // MARCO DE LA DIAPOSITIVA
        // Calcular las coordenadas de las esquinas del marco
        
        $size_horizontal = 900;
        $size_vertical = 655;
        $x1 = 30;
        $y1 = 30;
        $x2 = $x1 + $size_horizontal;
        $y2 = $y1 + $size_vertical;

        // Crear las cuatro líneas que forman el marco
        //               $fromX, $fromY, $toX, $toY
        //     L1
        // ------------
        // |l2        | l4
        // |__________|
        //     l3
        $line1 = new Line($x1, $y1, $x2, $y1);
        $line2 = new Line($x1, $y1, $x1, $y2);
        $line3 = new Line($x2, $y2, $x1, $y2);
        $line4 = new Line($x2, $y2, $x2, $y1);


        // Agrupar las líneas para hacer el marco
        $group = new Group();
        $group->addShape($line1);
        $group->addShape($line2);
        $group->addShape($line3);
        $group->addShape($line4);

        $currentSlide->addShape($group);
        
        // Para futuros marcos se usará la función crearMarco()


        // Caja de texto para el título
        $shape = $currentSlide->createRichTextShape()
            ->setHeight(310)
            ->setWidth(900)  // 960 en total width
            ->setOffsetX(30)
            ->setOffsetY(200);

        $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $textRun = $shape->createTextRun('REPORTE DE VENTAS');
        $textRun->getFont()->setBold(true)->setSize(30)->setColor(new Color(Color::COLOR_BLACK));

        
        // Caja de texto para el subtítulo
        $shape = $currentSlide->createRichTextShape()
            ->setHeight(310)
            ->setWidth(900)  // 960 en total width
            ->setOffsetX(30)
            ->setOffsetY(250);

        $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $textRun = $shape->createTextRun('DESEMPEÑO DEL AÑO 2024');
        $textRun->getFont()->setBold(false)->setSize(20)->setColor(new Color(Color::COLOR_BLACK));

        // TRANSICIÓN
        $currentSlide->setTransition($oTransition);


        // SEGUNDA DIAPOSITIVA  //////////////////////////////////////////////////////////////////

        // Se crea una diapositiva nueva 
        $slide2 = $objPHPPresentation->createSlide();

        $slide2->setBackground($background);

        $x1 = 30; 
        $y1 = 120;
        $size_horizontal = 900;
        $size_vertical = 560;

        $group2 = $this->crearMarco($x1,$y1,$size_horizontal,$size_vertical);

        $slide2->addShape($group2);

        // Agregar una imagen
        $shape = new Drawing\File();
        $shape->setName('logo')
            ->setDescription('Image File PNG')
            ->setPath(public_path('/imgs/logo_mdg.png'))
            ->setHeight(50)
            ->setOffsetX(33)
            ->setOffsetY(33)
            ->setFill($fill);
        $slide2->addShape($shape);

        $shape2 = new Drawing\File();
        $shape2->setName('Grfícas')
            ->setDescription('ventas_trimestrales_2024')
            ->setPath(public_path('storage/highchartsGraficas/barra.png'))
            ->setHeight(290)
            ->setOffsetX(35)
            ->setOffsetY(130)
            ->setFill($fill);
        $slide2->addShape($shape2);


        // Grafico generado y no borrado de highcharts
        // se tiene que tener encendido el servidor de highcharts 
        // comando:  highcharts-export-server --enableServer 1

        $namePV2024='productos_vendidos_2024'; 
        $title='PRODUCTOS VENDIDO 2024'; 
        $title_align='center'; 
        $subtitle='';
        $data=[
            ['name'=> 'PRODUCTO 1','y'=> 50],
            ['name'=> 'PRODUCTO 2','y'=> 30], 
            ['name'=> 'PRODUCTO 3','y'=> 10],
            ['name'=> 'PRODUCTO 4','y'=> 10]
        ];
        $colors=['#abebc6', '#82e0aa', '#28b463', '#1e8449'];
        $subfijo='%';

        // SE CREA IMAGEN DE GRÁFICO, NOTA: SE BORRA EN LA PARTE INFERIOR DE ESTE PROGRAMA : ChartsHGC::deletegraphHGC($namePV2024);
        ChartsHGC::pieHGC($namePV2024,$title,$title_align,$subtitle,$data,$colors,$subfijo);
        $pie_path = "storage/highchartsGraficas/$namePV2024.png";
        $shape3 = new Drawing\File();
        $shape3->setName('Grfícas')
            ->setDescription('productos vendido_2024')
            ->setPath(public_path($pie_path))
            ->setHeight(290)
            ->setOffsetX(490)
            ->setOffsetY(130)
            ->setFill($fill);
        $slide2->addShape($shape3);

         // Caja de texto para el título
        $shaped2 = $slide2->createRichTextShape()
            ->setHeight(310)
            ->setWidth(900)  // 960 en total width
            ->setOffsetX(30)
            ->setOffsetY(30);
     
        $shaped2->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $textRun = $shaped2->createTextRun('REPORTE DE VENTAS');
        $textRun->getFont()->setBold(true)->setSize(30)->setColor(new Color(Color::COLOR_BLACK));

        // Caja de texto para el contendo de la fila inferior
        $shape3 = $slide2->createRichTextShape()
            ->setHeight(450)
            ->setWidth(900)  // 960 en total width
            ->setOffsetX(30)
            ->setOffsetY(430);

            $texto_contenido = "Contenido de diapositiva: Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontró una de las palabras más oscuras Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontró una de las palabras más oscuras";

        $shape3->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_JUSTIFY);
            $textRun = $shape3->createTextRun($texto_contenido);
            $textRun->getFont()->setBold(false)->setSize(18)->setColor(new Color(Color::COLOR_BLACK));

        // TRANSICIÓN
        $slide2->setTransition($oTransition);

        
        // TERCERA DIAPOSITIVA  //////////////////////////////////////////////////////////////////

        // Se crea una diapositiva nueva 
        $slide3 = $objPHPPresentation->createSlide();
        
        $slide3->setBackground($background);

        // Agregar una imagen
        $shape = new Drawing\File();
        $shape->setName('logo')
            ->setDescription('Image File PNG')
            ->setPath(public_path('/imgs/logo_mdg.png'))
            ->setHeight(50)
            ->setOffsetX(33)
            ->setOffsetY(33)
            ->setFill($fill);
        $slide3->addShape($shape);

        // MARCO
        $marco = $this->crearMarco();

        $slide3->addShape($marco);

        // Caja de texto para el título
        $shape = $slide3->createRichTextShape()
            ->setHeight(310)
            ->setWidth(900)  // 960 en total width
            ->setOffsetX(30)
            ->setOffsetY(200);

        $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $textRun = $shape->createTextRun('FIN DE REPORTE');
        $textRun->getFont()->setBold(true)->setSize(30)->setColor(new Color(Color::COLOR_BLACK));


         // TRANSICIÓN
         $slide3->setTransition($oTransition);

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////

            // Crear el escritor (PPTX)
            $writer = IOFactory::createWriter($objPHPPresentation, 'PowerPoint2007');
      
            // Guardar temporalmente
            $tempFile = storage_path('app/public/PPTs/presentationdemo.pptx');
            $writer->save($tempFile);

            // BORRADO DE ITEMS GENERADOS  /////////////////////////////////////////////////////////////

            // Se borra le magen creada
            ChartsHGC::deletegraphHGC($namePV2024);


            
            // Descargar el archivo, sin Borra el archvio y guardarlo en el servidor
            return response()->download($tempFile)->deleteFileAfterSend(false);

    }

    public function crearMarco($_x1 = 30, $_y1=30, $_size_horizontal=900, $_size_vertical=665){
        
        // Calcular las coordenadas de las esquinas del marco
        $size_horizontal = $_size_horizontal;
        $size_vertical = $_size_vertical;
        $x1 = $_x1;
        $y1 = $_y1;

        $x2 = $x1 + $size_horizontal;
        $y2 = $y1 + $size_vertical;

        // Crear las cuatro líneas que forman el marco
        //               $fromX, $fromY, $toX, $toY
        //     L1
        // ------------
        // |l2        | l4
        // |__________|
        //     l3

        $line1 = new Line($x1, $y1, $x2, $y1);
        $line2 = new Line($x1, $y1, $x1, $y2);
        $line3 = new Line($x2, $y2, $x1, $y2);
        $line4 = new Line($x2, $y2, $x2, $y1);

        // Agrupar las líneas para hacer el marco
        $group = new Group();
        $group->addShape($line1);
        $group->addShape($line2);
        $group->addShape($line3);
        $group->addShape($line4);
        
        return $group; 
    }

}