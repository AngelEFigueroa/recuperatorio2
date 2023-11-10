<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;
class CategoriaSeeder extends Seeder
{

    public function run(): void
    {
        Categoria::create([
            'nombre' => 'Zapatilla'
        ]);

        Categoria::create([
            'nombre' => 'Remera'
        ]);
    }
}
