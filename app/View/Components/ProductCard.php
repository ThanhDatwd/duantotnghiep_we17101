<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $thumb;
    public $priceCurrent;
    public $priceOld;
    public $discount;
    public $link;
    public $id;
    public $isRow;
    public $isProgress;
    public $progressValue;
    public $progressTxt;
    public function __construct($name=null,$thumb=null,$discount=0,$priceCurrent=null,$priceOld=null,$link='',$id=null,$isRow=false,$isProgress=false ,$progressValue=0,$progressTxt='')
    {  
       $this->isProgress=$isProgress;
       $this->progressValue=$progressValue;
       $this->progressTxt=$progressTxt;
       $this->name=$name;
       $this->thumb=$thumb;
       $this->priceCurrent=$priceCurrent;
       $this->priceOld=$priceOld;
       $this->link=$link;
       $this->discount=$discount;
       $this->id=$id;
       $this->isRow=$isRow;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
   
    public function render()
    {
        return view('components.product-card');
    }
}
