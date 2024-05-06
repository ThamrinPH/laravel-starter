<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Js;
use Illuminate\View\Component;

class select2 extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id = '',
        public string $name = '',
        public string $valueId = '',
        public string $valueText = '',
        public string $route = '',
        public string $placeholder = '',
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select2');
    }
}
