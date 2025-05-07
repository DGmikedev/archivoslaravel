<?php

namespace App\Clases\PphOffice;

use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\Style\Color;
use PhpOffice\PhpPresentation\Style\Alignment;
use PhpOffice\PhpPresentation\Style\Borders;
use PhpOffice\PhpPresentation\Style\Border;
use PhpOffice\PhpPresentation\Slide\Background\Color as BackgroundColor;


class Presentacion4 
{

    public function crearppt4(){

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


        // Caja de texto para el contendo izquierdo
        $shape2 = $currentSlide->createRichTextShape()
                ->setHeight(900)
                ->setWidth(445)  // 960 en total width
                ->setOffsetX(30)
                ->setOffsetY(120);
            
        // Crea borde 
        $shape2->getBorder()
                ->setLineStyle(Border::LINE_SINGLE)
                ->setLineWidth(1)
                ->getColor()->setARGB('#000');
    
                $texto_contenido = "Contenido de diapositiva: Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad. ";
    
                $shape2->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_JUSTIFY);
                $textRun = $shape2->createTextRun($texto_contenido);
                $textRun->getFont()->setBold(false)->setSize(20)->setColor(new Color(Color::COLOR_BLACK));



        // Caja de texto para el contendo derecho-superior
        $shape3 = $currentSlide->createRichTextShape()
                ->setHeight(445)
                ->setWidth(445)  // 960 en total width
                ->setOffsetX(485)
                ->setOffsetY(120);
            
        // Crea borde 
        $shape3->getBorder()
                ->setLineStyle(Border::LINE_SINGLE)
                ->setLineWidth(1)
                ->getColor()->setARGB('#000');
    
                $texto_contenido = "Contenido de diapositiva: Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad. ";
    
                $shape3->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_JUSTIFY);
                $textRun = $shape3->createTextRun($texto_contenido);
                $textRun->getFont()->setBold(false)->setSize(20)->setColor(new Color(Color::COLOR_BLACK));


        // Caja de texto para el contendo derecho-superior
        $shape4 = $currentSlide->createRichTextShape()
                ->setHeight(445)
                ->setWidth(445)  // 960 en total width
                ->setOffsetX(485)
                ->setOffsetY(400);
          
        // Crea borde 
        $shape4->getBorder()
                ->setLineStyle(Border::LINE_SINGLE)
                ->setLineWidth(1)
                ->getColor()->setARGB('#000');
        
            $texto_contenido = "Contenido de diapositiva: Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad. ";
  
            $shape4->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_JUSTIFY);
            $textRun = $shape4->createTextRun($texto_contenido);
            $textRun->getFont()->setBold(false)->setSize(20)->setColor(new Color(Color::COLOR_BLACK));

        // Caja de texto para el contendo derecho-superior
        $shape5 = $currentSlide->createRichTextShape()
                ->setHeight(445)
                ->setWidth(445)  // 960 en total width
                ->setOffsetX(30)
                ->setOffsetY(400);
          
        // Crea borde 
        $shape5->getBorder()
                ->setLineStyle(Border::LINE_SINGLE)
                ->setLineWidth(1)
                ->getColor()->setARGB('#000');
        
            $texto_contenido = "Contenido de diapositiva: Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad. ";
  
            $shape5->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_JUSTIFY);
            $textRun = $shape5->createTextRun($texto_contenido);
            $textRun->getFont()->setBold(false)->setSize(20)->setColor(new Color(Color::COLOR_BLACK));

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////

            // Crear el escritor (PPTX)
            $writer = IOFactory::createWriter($objPHPPresentation, 'PowerPoint2007');
      
            // Guardar temporalmente
            $tempFile = storage_path('app/presentation4.pptx');
            $writer->save($tempFile);
            
            // Descargar el archivo
            return response()->download($tempFile)->deleteFileAfterSend(true);

    }

}