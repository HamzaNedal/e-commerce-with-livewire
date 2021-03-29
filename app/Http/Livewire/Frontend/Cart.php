<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class Cart extends Component
{
    public $cart;
    public function render()
    {
        return view('livewire.frontend.cart');
    }
    public function mount()
    {

        foreach (session('cart') ?? [] as $key => $product) {
            if (is_array($product)) {
                $this->cart['productQTY'][$product['id']] = $product['quantity'];
            }
        }
    }

    public function increase($id)
    {
        $products = session('cart')->toArray();
        $this->update_cart($products, $id, 1);
        $this->emit('cartCount', session('cart')['total_quantity']);
    }
    public function decrease($id)
    {
        $products = session('cart')->toArray();
        $this->update_cart($products, $id, -1);
        $this->emit('cartCount', session('cart')['total_quantity']);
    }
    public function delete($id){
        $products = session('cart')->toArray();
        foreach ($products as $key => $product) {
            if (is_array($product)) {
                if ($product['id'] == $id) {
                    $products['total_price'] -= $product['total_price'];
                    $products['total_quantity'] -=$product['quantity'];
                    unset($products[$key]);
                }
            }
        }
        session(['cart' => collect($products)]);
    }
    public function update_cart($products, $id, $numberForIncreaseOrDecrease)
    {
        if (session('cart')->where('id', $id)->first()) {
            foreach ($products as $key => $product) {
                if (is_array($product)) {
                    if ($product['id'] == $id) {
                        if($products[$key]['quantity'] == 1 && $numberForIncreaseOrDecrease < 0){
                            return;
                        }
                        $products[$key]['quantity'] += $numberForIncreaseOrDecrease;
                        
                        $this->cart['productQTY'][$product['id']] += $numberForIncreaseOrDecrease;
                        $products[$key]['total_price'] = ($product['price'] * $products[$key]['quantity']);
                        $products['total_price'] += ($product['price']*$numberForIncreaseOrDecrease);
                        $products['total_quantity'] += $numberForIncreaseOrDecrease;
                    }
                }
            }
            session(['cart' => collect($products)]);
        }
    }
}
