<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProducts extends Component
{
    use WithPagination;
    public $categories;
    public $search = ['all'];
    protected $paginationTheme = 'bootstrap';
   
    public function render()
    {
      
        if(array_key_exists('from',$this->search)){
            $searchByPrice = Product::disableCache()->whereBetween('price',[$this->search['from'],$this->search['to']])->where('status',1)->paginate(24);
            return view('livewire.frontend.show-products',['products'=>$searchByPrice]);
        }
        if(array_key_exists('orderBy',$this->search)){
            return view('livewire.frontend.show-products',['products'=>Product::disableCache()->orderBy($this->search['column'],$this->search['orderBy'])->where('status',1)->paginate(24)]);  
        }
        if(array_key_exists('category',$this->search)){
           
           $products = Product::disableCache()
           ->where('status',1)
           ->whereHas('category', function ($query) {
                 $query->whereSlug($this->search['category'])
                 ->whereStatus(1);
             })->paginate(24);
            return view('livewire.frontend.show-products',['products'=>$products]);  
        }

        return view('livewire.frontend.show-products',['products'=>Product::disableCache()->orderBy('created_at','desc')->where('status',1)->paginate(24)]);  
    }
    public function all(){
        $this->resetPage();
        $this->search = ['all'];
    }
    public function searchByCategory($slug){
        $this->resetPage();
        $this->search = [];
        $this->search['category'] = $slug;
    }
    public function searchByPrice($from,$to)
    {
        $this->resetPage();
        $this->search = [];
        $this->search['from'] = $from;
        $this->search['to'] = $to;
    }
    public  function default()
    {
        $this->resetPage();
        $this->search = [];
        $this->search['orderBy'] = 'desc';
        $this->search['column'] = 'created_at';
    }

    public  function newness()
    {
        $this->resetPage();
        $this->search = [];
        $this->search['orderBy'] = 'asc';
        $this->search['column'] = 'created_at';
    }
    public  function priceLowToHigh()
    {
        $this->resetPage();
        $this->search = [];
        $this->search['orderBy'] = 'asc';
        $this->search['column'] = 'price';
    }
    public  function priceHighToLow()
    {
        $this->resetPage();
        $this->search = [];
        $this->search['orderBy'] = 'desc';
        $this->search['column'] = 'price';
    }

}
