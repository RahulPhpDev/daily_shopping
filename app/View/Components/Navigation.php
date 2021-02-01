<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Navigation extends Component
{
    public $namenew;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($namenew)
    {
        $this->namenew = $namenew;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.navigation');
    }
}
