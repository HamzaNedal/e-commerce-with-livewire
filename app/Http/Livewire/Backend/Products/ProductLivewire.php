<?php

namespace App\Http\Livewire\Backend\Products;

use App\Http\Controllers\Backend\ProductsController;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProductLivewire extends Component
{
    public $product;
    protected $listeners = ['editProduct','resetForm','messageAlertSuccess'];

    public function render()
    {
        $this->dispatchBrowserEvent('contentChanged');
        $categories = Category::get();
        $users = User::get();
        $colors = Color::get();
        $sizes = Size::get();
        // $product = Product::with('size')->get();
        return view('livewire.backend.products.product-livewire',['categories'=>$categories,'users'=>$users,'colors'=>$colors,'sizes'=>$sizes,'product'=>$this->product]);
    }

    function save(){
        // $this->validate();
        $this->emit('resetForm');
        $this->emit('columns');
        if(array_key_exists('id',$this->user)){
           if(auth()->user()->hasPermissionTo('edit_product')){
               return $this->update();
           }
           return abort(403,'unauthrized');
        }
        if(auth()->user()->hasPermissionTo('add_product')){
           return $this->store();
        }
        return abort(403,'unauthrized');
  
    }
    public function store()
    {
        DB::beginTransaction();

        try {
            $product = Product::create([
                'name'=>$this->product['name'],
                'stock'=>$this->product['stock'],
                'price'=>$this->product['price'],
                'description'=>$this->product['description'],
                'fk_category'=>$this->product['category'],
                'fk_user'=>$this->product['user'],
                'status'=>$this->product['status'],
            ]);
            $product->colors()->sync($this->product['colors']);
            $product->sizes()->sync($this->product['sizes']);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
    }
    public function update()
    {
        $product = Product::findOrFail($this->product['id']);
        DB::beginTransaction();

        try {
            $product->update([
                'name'=>$this->product['name'],
                'stock'=>$this->product['stock'],
                'price'=>$this->product['price'],
                'description'=>$this->product['description'],
                'fk_category'=>$this->product['category'],
                'fk_user'=>$this->product['user'],
                'status'=>$this->product['status'],
            ]);
            $product->colors()->sync($this->product['colors']);
            $product->sizes()->sync($this->product['sizes']);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
    }
    function editProduct($id){
        $this->resetForm();
        $product =  Product::findOrFail($id);
        $this->product = $product->toArray();
        $this->emit('showMe','block');
    }
    
    function resetForm()
    {
       
       $this->reset();
       $this->resetValidation();
    }
}
