<?php

namespace App\Http\Livewire\Backend\Products\Sizes;

use App\Models\Size;
use Livewire\Component;

class SizeLivewire extends Component
{
    public $size;
    protected $listeners = ['editSize','resetForm','messageAlertSuccess'];
    public function render()
    {
        return view('livewire.backend.products.sizes.size-livewire');
    }
    function save(){
        
        if(array_key_exists('id',$this->size)){
           if(auth()->user()->hasPermissionTo('edit_size')){
              return  $this->update();
           }else{
            return abort(403,'unauthrized');
           }
        }
        if(auth()->user()->hasPermissionTo('add_size')){
            return  $this->store();
        }else{
             abort(403,'unauthrized');
        }
        
        
    }

    public function store()
    {
        Size::create(['title'=>$this->size['title'],]);
        $this->emit('showMe',['display'=>'none']);
        $this->emit('resetForm');
    }

    public function update()
    {
        $size = Size::findOrFail($this->size['id']);
        $size->update(['title'=>$this->size['title']]);
        $this->emit('showMe',['display'=>'none']);
        $this->emit('resetForm');
    }

    function editSize($id){
        $this->resetForm();
        $size =  Size::findOrFail($id);
        $this->size = $size->toArray();
        $this->emit('showMe',['display'=>'block']);
    }
    
    function resetForm()
    {
       $this->reset();
       $this->resetValidation();
       $this->emit('columns');
    }
}
