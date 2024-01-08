<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = User::query()->create([
            'role_id' => Role::query()->where('title' , 'admin')->first()->id,
            'name' => 'Admin',
            'lastname' => 'Admin Lastname',
            'username' => 'admin',
            'email' => 'rralireza82@gmail.com',
            'password' => bcrypt('admin'),
            'image' => 'public/users/admin.png'
        ]);
    }
}
