<?php

namespace App\Livewire;

use Livewire\Component;


class Counter extends Component
{

    public $msg = "MENSAJE RELACIONADO CON LE BENVENIDA AL USUARIO";
    public $txt;
    public $cambio;

    public function render()
    {
        return view('livewire.counter');
    }

   
}
