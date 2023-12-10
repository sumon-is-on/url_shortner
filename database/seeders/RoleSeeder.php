<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    public function run(): void{
        Role::create([
            'name'=>'Admin',
            'slug'=>'admin',
            'details'=>'Admin has all the access of the entire website.',
        ]);
        Role::create([
            'name'=>'User',
            'slug'=>'user',
            'details'=>'User will do the assigned works.',
        ]);
    }
}
