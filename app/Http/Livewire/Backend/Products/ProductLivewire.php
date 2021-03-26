<?php

namespace App\Http\Livewire\Backend\Products;

use App\Http\Controllers\Backend\ProductsController;
use App\Models\Category;
use App\Models\Color;
use App\Models\Media;
use App\Models\Product;
use App\Models\Size;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductLivewire extends Component
{
    use WithFileUploads;
    public $product;
    // public $images;
    protected $listeners = ['editProduct','resetForm','messageAlertSuccess'];
    public function render()
    {
       
        // $this->dispatchBrowserEvent('contentChanged');
        $categories = Category::get();
        $users = User::get();
        $colors = Color::get();
        $sizes = Size::get();
        return view('livewire.backend.products.product-livewire',['categories'=>$categories,'users'=>$users,'colors'=>$colors,'sizes'=>$sizes]);
    }
    // public function updatedimages($images){
    //     $imagePreview = [];
    //      foreach ($images as $value) {
    //         $imagePreview[] = $value->temporaryUrl();
    //      }
    //     $this->emit('imagesPreview',$imagePreview);
    //     // dd($value);
    // }
    function save(){
       
     
        // $this->validate();
        $this->emit('resetForm');
        $this->emit('columns');
       
        if(array_key_exists('id',$this->product)){
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
            $this->upoladImage($product);
            // foreach ($this->product['images'] as  $image) {
            //     $file_name = str_replace('public/','',$image->store('public/media'));
            //     Media::create([
            //         'product_id' => $product->id,
            //         'file_name' =>  $file_name,
            //         'file_size' => $image->getSize(),
            //         'file_type' => $image->getMimeType(),
            //     ]);
            // }
            // $product->media()->sync();
            DB::commit();
            $this->emit('showMe',['display'=>'none']);
        } catch (\Exception $e) {
            dd($e->getMessage());
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
            $this->upoladImage($product);
            DB::commit();
            $this->emit('showMe',['display'=>'none']);
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
        }
    }
    function editProduct($id){
        $this->resetForm();
        $product =  Product::findOrFail($id);
        // $this->dispatchBrowserEvent('contentChanged',$product->colors->pluck('title','id')->toArray());
        // dd();
        $this->product = $product->toArray();
        $images = [];
        foreach ($product->media as $key => $media) {
            $images['images'][] =  asset("storage/media/$media->file_name");
            $images['captions'][] = 
                [
                'caption'=>$media->file_name,
                'size'=> $media->file_size,
                'width'=>"120px",
                'url'=>route('admin.products.media.destroy',[$media->id,'_token'=>csrf_token()]),
                'key'=>$media->id,
                ];
        }
        // dd($images);
        // $this->dispatchBrowserEvent('addInitPhoto', ['images'=>$images]);
        $this->emit('showMe',[
            'display'=>'block',
            'category'=>$product->fk_category,
            'user'=>$product->fk_user,
            'colors'=>$product->colors->pluck('id')->toArray(),
            'sizes'=>$product->sizes->pluck('id')->toArray(),
            'images'=>$images,
           
        ]);
    }
    
    function resetForm()
    {
       
       $this->reset();
       $this->resetValidation();
    }

    function upoladImage($product){
        foreach ($this->product['images'] ?? [] as  $image) {
            $file_name = str_replace('public/media/','',$image->store('public/media'));
            Media::create([
                'product_id' => $product->id,
                'file_name' =>  $file_name,
                'file_size' => $image->getSize(),
                'file_type' => $image->getMimeType(),
            ]);
        }
    }
}
