<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;

class SidebarNavigation extends Component
{

    public $href;
    public $text;
    public $logo;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->href = $href;
//        $this->text = $text;
//        $this->logo = $logo;
    }

//    public function __construct($href, $text, $logo)
//    {
//        dd($href);
//        $this->href = $href;
//        $this->text = $text;
//        $this->logo = $logo;
//    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin.sidebar-navigation');
    }
}
