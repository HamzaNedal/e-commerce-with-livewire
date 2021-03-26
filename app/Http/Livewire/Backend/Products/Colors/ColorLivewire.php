<?php

namespace App\Http\Livewire\Backend\Products\Colors;

use App\Models\Color;
use Livewire\Component;

class ColorLivewire extends Component
{
    public $color;
    protected $listeners = ['editColor','resetForm','messageAlertSuccess'];
    public function render()
    {
        return view('livewire.backend.products.colors.color-livewire');
    }
    function save(){
        
        if(array_key_exists('id',$this->color)){
           if(auth()->user()->hasPermissionTo('edit_color')){
              return  $this->update();
           }else{
            return abort(403,'unauthrized');
           }
        }
        if(auth()->user()->hasPermissionTo('add_color')){
            return  $this->store();
        }else{
             abort(403,'unauthrized');
        }
        
        
    }

    public function store()
    {
        Color::create(['title'=>$this->color['title'],]);
        $this->emit('showMe',['display'=>'none']);
        $this->emit('resetForm');
    }

    public function update()
    {
        $color = Color::findOrFail($this->color['id']);
        $color->update(['title'=>$this->color['title']]);
        $this->emit('showMe',['display'=>'none']);
        $this->emit('resetForm');
    }

    function editColor($id){
        $this->resetForm();
        $color =  Color::findOrFail($id);
        $this->color = $color->toArray();
        $this->emit('showMe',['display'=>'block']);
    }
    
    function resetForm()
    {
       $this->reset();
       $this->resetValidation();
       $this->emit('columns');
    }
    
}
