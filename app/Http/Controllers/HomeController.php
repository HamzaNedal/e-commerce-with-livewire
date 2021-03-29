<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::get();
        $categories = Category::get();
        // $products = Product::paginate(25);
        return view('frontend.home', compact('sliders', 'categories'));
    }

    public function product_details($slug)
    {
        $product = Product::whereSlug($slug)->whereStatus(1)->first() ?? abort(404);

        return view('frontend.product-details', compact('product'));
    }

    public function cart()
    {


        // dd();
        // dd(session('cart'));
        //     $cart = session('cart')->forget('total_quantity');
        //    $cart = session('cart')->forget('total_price');
        
        // $unique = session('cart')->each(function ($item)
        // {
        //     if (is_array($item)) {
        //         dd($item);
        //     }
         
        // })
        // ->unique(function ($item) {
        //     if (is_array($item)) {
        //         return $item['id'] . $item['color'] . $item['size'];
        //     }
        // });
        // dd($unique);

        // foreach ($variable as $key => $value) {
        //     # code...
        // }
        return view('frontend.cart');
    }
}
