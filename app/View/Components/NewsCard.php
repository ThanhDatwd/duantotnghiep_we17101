<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NewsCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $thumb;
    public $date;
    public $summary;
    public $link;
    public $id;
    public $isRow;
    public $slug;
    public $content;
    public $month;
    public $day;
    public function __construct($title=null,$thumb=null,$date=0, $month=null,$day=null,$summary=null,$content=null,$link='',$id=null,$isRow=false,$slug=null)
    {  
       $this->slug=$slug;
       $this->title=$title;
       $this->thumb=$thumb;
       $this->summary=$summary;
       $this->content=$content;
       $this->link=$link;
       $this->date=$date;
       $this->month=$month;
       $this->day=$day;
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
        return view('components.news-card');
    }
}
