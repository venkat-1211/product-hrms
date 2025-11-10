<?php

namespace Modules\Common\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DynamicButton extends Component
{
    /**
     * Create a new component instance.
     */

    public array $types;

    public function __construct(array $types = [])
    {
        $this->types = $types;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('common::components.dynamic-button');
    }
}
