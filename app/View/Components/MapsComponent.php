<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MapsComponent extends Component
{
    public $target;
    /**
     * Create a new component instance.
     */
    public function __construct($_target="default1")
    {
        $this->target =$_target;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.maps-component', ["target" => $this->target]);
    }
}
