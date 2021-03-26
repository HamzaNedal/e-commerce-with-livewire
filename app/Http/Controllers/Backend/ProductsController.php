<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active = 'products';
        return view('backend.products.index',compact('active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd('sd');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->sizes()->detach();
        $product->colors()->detach();
        $product->media()->delete();
        $product->delete();
    }
    public function changeStatus($id){
        $product = Product::findOrFail($id);
        $product->status = !$product->status;
        $product->save();
    }
    public function uploadImages()
    {
            dd(request()->all());
        // if ($equestr->images && count($request->images) > 0) {
        //     store_image_for_posts($post, $request);
        // }


    }
    public function destroy_media(){
        dd('test');
    }
    public function categories_index()
    {
        $active = 'products';
        return view('backend.products.categories.index',compact('active'));
    }
    public function colors_index()
    {
        $active = 'products';
        return view('backend.products.colors.index',compact('active'));
    }
    public function sizes_index()
    {
        $active = 'products';
        return view('backend.products.sizes.index',compact('active'));
    }
    
}
