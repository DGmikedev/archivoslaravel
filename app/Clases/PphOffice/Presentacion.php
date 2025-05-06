<?php

namespace App\Clases\PphOffice;

use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\Style\Color;
use PhpOffice\PhpPresentation\Style\Alignment;
use PhpOffice\PhpPresentation\Style\Borders;
use PhpOffice\PhpPresentation\Style\Border;
use PhpOffice\PhpPresentation\Slide\Background\Color as BackgroundColor;


class Presentacion 
{

    public function crearppt1(){

        // Se crea una nueva presentación
        $objPHPPresentation = new PhpPresentation();

        // Se crea la primer diapositiva
        $currentSlide = $objPHPPresentation->getActiveSlide();

        // Color de fondo   Color::COLOR_WHITE
        $background = new BackgroundColor();
        $background->setColor(new Color(Color::COLOR_GREENSOFT));
        $currentSlide->setBackground($background);


        // Caja de texto para el título
        $shape = $currentSlide->createRichTextShape()
            ->setHeight(310)
            ->setWidth(900)  // 960 en total width
            ->setOffsetX(30)
            ->setOffsetY(30);
        
        // Crea borde 
        $shape->getBorder()
            ->setLineStyle(Border::LINE_SINGLE)
            ->setLineWidth(1)
            ->getColor()->setARGB('#000');

            $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $textRun = $shape->createTextRun('Titúlo de diapositiva');
            $textRun->getFont()->setBold(false)->setSize(30)->setColor(new Color(Color::COLOR_BLACK));


        // Caja de texto para el contendo
        $shape2 = $currentSlide->createRichTextShape()
            ->setHeight(900)
            ->setWidth(900)  // 960 en total width
            ->setOffsetX(30)
            ->setOffsetY(100);
        
        // Crea borde 
        $shape2->getBorder()
            ->setLineStyle(Border::LINE_SINGLE)
            ->setLineWidth(1)
            ->getColor()->setARGB('#000');

            $texto_contenido = "Contenido de diapositiva: 
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut vero recusandae ex tempore quia sunt deleniti eligendi ratione adipisci ab? Harum iusto quia facilis asperiores minima, repellat sapiente sit corporis.Consequuntur dolores neque numquam natus repellendus, dignissimos itaque quia? Est, placeat, voluptatem sint dolor mollitia iusto iure debitis at recusandae aperiam, ullam nam eveniet! Aliquid enim dicta itaque voluptas amet.Quis a quia, magnam delectus sed mollitia dicta praesentium sequi dolores sit ullam consectetur recusandae excepturi fugit odio nostrum ut harum nemo debitis iste, nobis impedit, animi saepe minima? Dicta!|| Harum iusto quia facilis asperiores minima, repellat sapiente sit corporis|| Harum iusto quia facilis asperiores minima, repellat sapiente sit corporis
            ";

            $shape2->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_JUSTIFY);
            $textRun = $shape2->createTextRun($texto_contenido);
            $textRun->getFont()->setBold(false)->setSize(24)->setColor(new Color(Color::COLOR_BLACK));



            //////////////////////////////////////////////////////////////////////////////////////////////////////////////

            // Crear el escritor (PPTX)
           $writer = IOFactory::createWriter($objPHPPresentation, 'PowerPoint2007');
      
           // Guardar temporalmente
           $tempFile = storage_path('app/presentation.pptx');
           $writer->save($tempFile);
           
           // Descargar el archivo
           return response()->download($tempFile)->deleteFileAfterSend(true);


    }
}
