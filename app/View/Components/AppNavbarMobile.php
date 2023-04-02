<?php

namespace App\View\Components;

use App\Models\category_group;
use Illuminate\View\Component;

class AppNavbarMobile extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $category_group=[];

    public function __construct()
    {
        $this->category_group=category_group::with('categories')->distinct()->get();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     * 
     */
    public function render()
    {
        return view('components.app-navbar_mobile');
    }
}
