<?php

namespace App\Http\Livewire\Backend\Products\Categories;

use App\Models\Category;
use Livewire\Component;

class CategoryLivewire extends Component
{
    public $category;
    // public $images;
    protected $listeners = ['editCategory','resetForm','messageAlertSuccess'];
    public function render()
    {
        return view('livewire.backend.products.categories.category-livewire');
    }
    function save(){
        
        if(array_key_exists('id',$this->category)){
           if(auth()->user()->hasPermissionTo('edit_category')){
              return  $this->update();
           }else{
            return abort(403,'unauthrized');
           }
        }
        if(auth()->user()->hasPermissionTo('add_category')){
            return  $this->store();
        }else{
             abort(403,'unauthrized');
        }
        
        
    }

    public function store()
    {
        Category::create([
            'title'=>$this->category['title'],
            'status'=>$this->category['status'],
        ]);
        $this->emit('showMe',['display'=>'none']);
        $this->emit('resetForm');
    }

    public function update()
    {
        $category = Category::findOrFail($this->category['id']);
        $category->update([
            'title'=>$this->category['title'],
            'status'=>$this->category['status'],
        ]);
        $this->emit('showMe',['display'=>'none']);
        $this->emit('resetForm');
    }

    function editCategory($id){
        $this->resetForm();
        $category =  Category::findOrFail($id);
        $this->category = $category->toArray();
        $this->emit('showMe',['display'=>'block']);
    }
    
    function resetForm()
    {
       $this->reset();
       $this->resetValidation();
       $this->emit('columns');
    }
}
