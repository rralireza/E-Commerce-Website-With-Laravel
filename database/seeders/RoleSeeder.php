<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::query()->create([
            'title' => 'admin'
        ]);

        $admin->permissions()->attach(Permission::all());

        Role::query()->insert([
            'title' => 'user'
        ]);


    }
}
