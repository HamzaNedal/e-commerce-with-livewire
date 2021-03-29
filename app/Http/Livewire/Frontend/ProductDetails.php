<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use App\Models\Reviews;
use Livewire\Component;

class ProductDetails extends Component
{
    public $product;
    public $info;
    public $active = 'description';
    // protected $listeners = ['cartCount'];
    public function render()
    {
        $this->product = Product::findOrFail($this->product->id);
        return view('livewire.frontend.product-details');
    }
    protected $rules = [
        'info.size' => 'required|integer',
        'info.color' => 'required|integer',
        'info.quantity' => 'required|integer',
    ];
    public function addToCart()
    {
        // $this->emit('cartCount');
        $this->validate();
        $this->info['id'] = $this->product->id . "-" . $this->info['color'] . "-" . $this->info['size'];
        $this->info['name'] = $this->product->name;
        $this->info['price'] = $this->product->price;
        $this->info['total_price'] = ($this->info['price'] *$this->info['quantity']);
        $this->info['image'] = $this->product->media[0]->file_name;
        if ($this->product->sizes()->get()->where('id', $this->info['size'])->first()) {
            $this->info['size_name'] = $this->product->sizes()->get()->where('id', $this->info['size'])->first()['title'];
        }
        if ($this->product->colors()->get()->where('id', $this->info['color'])->first()) {
            $this->info['color_name'] = $this->product->colors()->get()->where('id', $this->info['color'])->first()['title'];
        }


        $cart = session('cart');

        if (!$cart) {
            $cart = collect([$this->info]);
            session(['cart' => $cart]);
        } else {
            $key = $cart->where('id', $this->info['id'])->keys()->first();
            //    dd($key);
            session('cart')->each(function ($item, $key) {
                if (is_array($item)) {
                    if ($item['id'] == $this->info['id']) {
                        $this->info['quantity'] += $item['quantity'];
                        return $this->info['total_price'] = ($item['price'] * $this->info['quantity']);
                    }
                }
            });

            // dd($this->info['total_price']);
            if (!is_null($key)) {
                $cart = $cart->replace([$key => $this->info]);
            } else {
                $cart = $cart->push($this->info);
            }
        }
        // dd($cart);
        // $cart = collect(session('cart')[0]);
        // $cart = $cart->forget('quantity');
        // dd($cart);

        // dd($cart);
        // $quantity = $cart->duplicates('id');
        // dd($quantity);
        // $cart =  $cart->unique();
        // dd($cart);

        // dd($cart);
        $cart['total_quantity'] = $cart->sum('quantity');
        $cart['total_price'] =  $cart->sum('total_price');
        session(['cart' => $cart]);

        // $count = count();
        $this->emit('cartCount', session('cart')['total_quantity']);
        //    dd( session('cart') );

    }

    public function save()
    {
        Reviews::create([
            'stars' => $this->info['reviews']['stars'],
            'fk_product' => $this->product->id,
            'description' => $this->info['reviews']['description'],
            'guest_name' => $this->info['reviews']['name'],
            'guest_email' => $this->info['reviews']['email'],
        ]);
        $this->reset('info');
        // dd($this->product);
    }
    public function active($tab)
    {
        $this->active = $tab;
    }
}
