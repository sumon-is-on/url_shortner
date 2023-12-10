<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run(): void{
        User::create([
            'name'=>'Admin',
            'slug'=>'admin001',
            'role_id'=>1,
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('12345678')
        ]);
        User::create([
            'name'=>'Sumon',
            'slug'=>'sumon007',
            'role_id'=>2,
            'email'=>'sumon@gmail.com',
            'password'=>bcrypt('09876543')
        ]);
        // User::factory()->count(3)->create();
    }
}
