<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{

    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password'=> Hash::make('12345678'),
        ])->assignRole('admin');

        User::create([
            'name' => 'vendedor',
            'email' => 'vendedor@gmail.com',
            'password'=> Hash::make('12345'),
        ])->assignRole('vendedor');

        User::create([
            'name' => 'cliente',
            'email' => 'cliente@gmail.com',
            'password'=> Hash::make('12345'),
        ])->assignRole('cliente');
    }
}
