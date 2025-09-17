<?php

namespace Modules\Common\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NoDataAvailable extends Component
{
    /**
     * Create a new component instance.
     */

    public $color;
    public $message;

    public function __construct($color, $message)
    {
        $this->color = $color;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('common::components.no-data-available');
    }
}
