<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Permission::create(['name' => 'show_products']);
         Permission::create(['name' => 'edit_product']);
         Permission::create(['name' => 'delete_product']);
         Permission::create(['name' => 'add_product']);
         Permission::create(['name' => 'delete_order']);
         Permission::create(['name' => 'change_status_product']);
         Permission::create(['name' => 'add_user']);
         Permission::create(['name' => 'edit_user']);
         Permission::create(['name' => 'delete_user']);
         Permission::create(['name' => 'show_user']);
         Permission::create(['name' => 'show_roles']);
         Permission::create(['name' => 'add_role']);
         Permission::create(['name' => 'edit_role']);
         Permission::create(['name' => 'add_color']);
         Permission::create(['name' => 'edit_color']);
         Permission::create(['name' => 'show_colors']);
         Permission::create(['name' => 'delete_color']);
         Permission::create(['name' => 'add_category']);
         Permission::create(['name' => 'edit_category']);
         Permission::create(['name' => 'delete_category']);
         Permission::create(['name' => 'show_categories']);
         Permission::create(['name' => 'show_sizes']);
         Permission::create(['name' => 'add_size']);
         Permission::create(['name' => 'edit_size']);
         Permission::create(['name' => 'delete_size']);
    }
}
