<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\Product;
use Illuminate\Database\Seeder;

class MediaForAllProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = collect(Product::get());
        foreach ($products as $key => $product) {
            $media = Media::select('file_name','file_size','file_type')->inRandomOrder()->limit(5)->get()->toArray();
            
            // dd($media);
            $product->media()->createMany($media);
        }
    }
}
