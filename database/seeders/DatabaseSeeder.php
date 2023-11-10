<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Producto;
class DatabaseSeeder extends Seeder
{

    public function run()
    {
        
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategoriaSeeder::class);

        // Crearemos 20 productos
        Producto::factory(20)->create();

    }
}
