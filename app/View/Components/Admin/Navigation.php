<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class Navigation extends Component
{

    public $names;
    public $link;
    public $icon;
    public $activeClass;

    public function __construct($names, $link, $icon,$activeClass = 'active')
    {
        $this->names = $names;
        $this->link = $link;
        $this->icon = $icon;
        $this->activeClass = $activeClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin.navigation');
    }
}
