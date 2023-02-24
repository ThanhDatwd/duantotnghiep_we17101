<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CouponCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $list;
    public function __construct($list)
    {    
        $this->list=json_decode($list);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    { 
        return view('components.coupons-card');
    }
}
