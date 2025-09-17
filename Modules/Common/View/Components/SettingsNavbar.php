<?php

namespace Modules\Common\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SettingsNavbar extends Component
{

    public $mainMenu;
    /**
     * Create a new component instance.
     */
    public function __construct($mainMenu)
    {
        $this->mainMenu = $mainMenu;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('common::settings.components.settings-navbar');
    }
}
