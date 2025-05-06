<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\Style\Color;
use PhpOffice\PhpPresentation\Style\Alignment;
use PhpOffice\PhpPresentation\Slide\Background\Color as BackgroundColor;




class PPTController extends Controller
{
    public function presentacion(){
         
        // Se crea una nueva presentación
        $objPHPPresentation = new PhpPresentation();

        // Se crea la primer diapositiva
        $currentSlide = $objPHPPresentation->getActiveSlide();
 
        // Color de fondo
        $background = new BackgroundColor();
        $background->setColor(new Color(Color::COLOR_WHITE));
        $currentSlide->setBackground($background);
 
        // Agregar una caja de texto
        $shape = $currentSlide->createRichTextShape()
            ->setHeight(300)
            ->setWidth(600)
            ->setOffsetX(170)
            ->setOffsetY(180);

         $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
         $textRun = $shape->createTextRun('Hola desde Laravel y PHPPresentation!');
         $textRun->getFont()->setBold(true)->setSize(24)->setColor(new Color(Color::COLOR_BLACK));
 


        // Crear el escritor (PPTX)
        $writer = IOFactory::createWriter($objPHPPresentation, 'PowerPoint2007');

        // Guardar temporalmente
        $tempFile = storage_path('app/presentation.pptx');
        $writer->save($tempFile);
        
        // Descargar el archivo
        return response()->download($tempFile)->deleteFileAfterSend(true);
     


    }
}
