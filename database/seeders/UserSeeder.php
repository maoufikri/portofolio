<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'Muhammad Fikri Baihaqi',
            'username' => 'maousama',
            'password' => Hash::make('Baihaqimaousama123'), // Jangan lupa hash!
        ]);
    }

}
