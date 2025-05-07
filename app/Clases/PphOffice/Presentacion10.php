<?php

namespace App\Clases\PphOffice;

use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\Style\Color;
use PhpOffice\PhpPresentation\Style\Alignment;
use PhpOffice\PhpPresentation\Style\Borders;
use PhpOffice\PhpPresentation\Style\Border;

use PhpOffice\PhpPresentation\Shape\Drawing; // Clases que manejan las imagenes
use PhpOffice\PhpPresentation\Style\Fill;    // Clases que manejan las imagenes

use PhpOffice\PhpPresentation\Slide\Background\Color as BackgroundColor;

class Presentacion10
{
    public function crearppt10(){

        // Se crea una nueva presentación
        $objPHPPresentation = new PhpPresentation();

        // Se crea la primer diapositiva
        $currentSlide = $objPHPPresentation->getActiveSlide();

        // Color de fondo   Color::COLOR_WHITE
        $background = new BackgroundColor();
        $background->setColor(new Color(Color::COLOR_GREENSOFT));
        $currentSlide->setBackground($background);


        // AQUI SE DESCRIBE  COMO INCLUIR IMAGENES /////////////////////////////////////////////////////////////
        // C:\laragon\www\archivoslaravel\vendor\phpoffice\phppresentation\samples\Sample_03_Image.php

        // Add a file drawing (PNG transparent) to the slide
        $fill = new Fill();
        $fill->setFillType(Fill::FILL_SOLID)->setStartColor(new Color(Color::COLOR_DARKRED));

        // Agregar una imagen
        $shape = new Drawing\File();
        $shape->setName('Image File PNG')
            ->setDescription('Image File PNG')
            ->setPath(public_path('/imgs/logo_mdg.png'))
            ->setHeight(50)
            ->setOffsetX(33)
            ->setOffsetY(33)
            ->setFill($fill);
        $currentSlide->addShape($shape);

        // Agregar una imagen
        $shape = new Drawing\File();
        $shape->setName('Image File PNG')
            ->setDescription('Image File PNG')
            ->setPath(public_path('storage/highchartsGraficas/barra.png'))
            ->setHeight(290)
            ->setOffsetX(33)
            ->setOffsetY(120)
            ->setFill($fill);
        $currentSlide->addShape($shape);

        // Agregar una imagen
        $shape = new Drawing\File();
        $shape->setName('Image File PNG')
            ->setDescription('Image File PNG')
            ->setPath(public_path('storage/highchartsGraficas/barra.png'))
            ->setHeight(290)
            ->setOffsetX(33)
            ->setOffsetY(415)
            ->setFill($fill);
        $currentSlide->addShape($shape);

        /////////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////////////

        // Caja de texto para el título
        $shape = $currentSlide->createRichTextShape()
            ->setHeight(310)
            ->setWidth(900)  // 960 en total width
            ->setOffsetX(30)
            ->setOffsetY(30);

            $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $textRun = $shape->createTextRun('IMAGENES EN DIAPOSITIVA');
            $textRun->getFont()->setBold(false)->setSize(30)->setColor(new Color(Color::COLOR_BLACK));

        // Caja de texto para el contendo columna derecha
        $shape3 = $currentSlide->createRichTextShape()
                ->setHeight(900)
                ->setWidth(445)  // 960 en total width
                ->setOffsetX(485)
                ->setOffsetY(120);
            
        // Crea borde 
        $shape3->getBorder()
                ->setLineStyle(Border::LINE_SINGLE)
                ->setLineWidth(1)
                ->getColor()->setARGB('#000');
    
                $texto_contenido = "Contenido de diapositiva: Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontró una de las palabras más oscuras Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontró una de las palabras más oscuras de la lengua del latín          
Lorem impsum dolor, Lorem impsum dolor";
    
                $shape3->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_JUSTIFY);
                $textRun = $shape3->createTextRun($texto_contenido);
                $textRun->getFont()->setBold(false)->setSize(20)->setColor(new Color(Color::COLOR_BLACK));

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////

            // Crear el escritor (PPTX)
            $writer = IOFactory::createWriter($objPHPPresentation, 'PowerPoint2007');
      
            // Guardar temporalmente
            $tempFile = storage_path('app/presentation10.pptx');
            $writer->save($tempFile);
            
            // Descargar el archivo
            return response()->download($tempFile)->deleteFileAfterSend(true);

    }
}