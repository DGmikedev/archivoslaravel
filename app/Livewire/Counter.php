<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{

    public $count = 0;
    public $saludo = "Hola mundo";
    public $categories = [1994,2000,2005,2010,2015,2020,2023];

    public function increment(){
        $this->count++;
    }

    public function actualiza_grafica(){
        return "hola";
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
