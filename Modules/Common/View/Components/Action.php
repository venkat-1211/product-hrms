<?php

namespace Modules\Common\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Action extends Component
{
    /**
     * Create a new component instance.
     */
    public array $target;  //modal
    public array $list;  //eye, edit, delete
    public int $id;   // id
    public function __construct(array $target, array $list, int $id)
    {
        $this->target = $target;
        $this->list = $list;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('common::components.action');
    }
}
