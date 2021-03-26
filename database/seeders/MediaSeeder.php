<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\Product;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = collect(Product::get());
        Media::factory()->count(100)->state(function () use ( $products) {
            $product = $products->random();
            return [
                'product_id' => $product->id,
                'created_at' => $product->created_at,
                'updated_at' => $product->created_at,
            ];
        })->create();
       
   
    }
}
