<?php

namespace Modules\Common\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatusBadge extends Component
{
    /**
     * Create a new component instance.
     */
    public $color;
    public $icon;
    public $label;
    public function __construct($color, $icon, $label)
    {
        $this->color = $color;
        $this->icon = $icon;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('common::components.status-badge');
    }
}
