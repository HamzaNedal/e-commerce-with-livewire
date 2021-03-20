<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;

class ShowComponent extends Component
{
    public $route = 1;
    protected $listeners = ['loadComponent'];
    public function render()
    {
        // dd($this->route== 1);
       if($this->route == 1){
            return view('livewire.backend.show-component',['route_name'=>'index']);
       }else{
           return  view("livewire.backend.show-component",['route_name'=>$this->route ]);
       }
       
    }
    function loadComponent($route)
    {
        $this->route = $route;
    }

    
}
