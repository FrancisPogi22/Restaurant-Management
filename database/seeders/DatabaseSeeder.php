<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'Francis Pogi',
            'user_role' => 2,
            'email' => 'francistengteng10@gmail.com',
            'password' => Hash::make('pogikotalaga22'),
        ]);

        Categories::create([
            'category_name' => 'Coffee'
        ]);
    }
}
