<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = [
        ['title'=>'XS'],
        ['title'=>'S'],
        ['title'=>'M'],
        ['title'=>'L'],
        ['title'=>'XL'],
        ['title'=>'XXL'],
        ['title'=>'XXXL'],
    ];
        Size::insert($sizes);
        // Size::factory()->count(10)->create();
    }
}
