<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions =  Permission::get();
        Role::create(['name'=>'admin'])->syncPermissions($permissions);
        Role::create(['name'=>'user']);
        User::factory()
        ->count(50)
        ->create();
        User::create(['name'=>'hamza','email'=>'hamza@mail.com','password'=>'123456789'])->syncRoles(['admin']);
    }
}
