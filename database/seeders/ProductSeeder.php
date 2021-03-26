<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = collect(User::get()->modelKeys());
        $categories = collect(Category::get()->modelKeys());
        
        Product::factory()->times(1000)->state(function () use ($users, $categories) {
            $date = Carbon::create(rand(2019, 2020), rand(1, 12), rand(1, 31),rand(0, 23),rand(0, 59),rand(0, 59));
           
            return [
                'fk_user' => $users->random(),
                'fk_category' => $categories->random(),
                'created_at' => $date,
                'updated_at' => $date,
            ];
        })
        ->create();
        $products = Product::get();
        foreach ($products as $key => $product) {
            $colors = collect(Color::inRandomOrder()->limit(10)->get()->modelKeys());
            $sizes = collect(Size::inRandomOrder()->limit(3)->get()->modelKeys());
            $product->colors()->sync($colors);
            $product->sizes()->sync($sizes);
        }

    }
}
