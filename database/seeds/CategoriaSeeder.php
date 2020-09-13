<?php

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Categoria::create([
            'categoria'      =>     'Celulares y Telefonia',
            'icon'      =>      'fas fa-mobile-alt'
        ]);

        App\Categoria::create([
            'categoria'      =>     'Computacion',
            'icon'      =>      'fas fa-desktop'
        ]);

        App\Categoria::create([
            'categoria'      =>     'Belleza y Cuidado Personal',
            'icon'      =>      'fas fa-hand-holding-medical'
        ]);

        App\Categoria::create([
            'categoria'      =>     'Autos, Motos y Otros',
            'icon'      =>      'fas fa-car'
        ]);

        App\Categoria::create([
            'categoria'      =>     'Consolas y Videojuegos',
            'icon'      =>      'fas fa-gamepad'
        ]);

        App\Categoria::create([
            'categoria'      =>     'Bebés',
            'icon'      =>      'fas fa-baby-carriage'
        ]);

        App\Categoria::create([
            'categoria'      =>     'Camaras y Accesorios',
            'icon'      =>      'fas fa-camera-retro'
        ]);

        App\Categoria::create([
            'categoria'      =>     'Agro',
            'icon'      =>      'fas fa-tractor'
        ]);

        App\Categoria::create([
            'categoria'      =>     'Animales y Mascotas',
            'icon'      =>      'fas fa-paw'
        ]);

        App\Categoria::create([
            'categoria'      =>     'Arte',
            'icon'      =>      'far fa-hourglass'
        ]);

        App\Categoria::create([
            'categoria'      =>     'Accesorios para Vehiculos',
            'icon'      =>      'fas fa-tachometer-alt'
        ]);

        App\Categoria::create([
            'categoria'      =>     'Alimentos y Bebidas',
            'icon'      =>      'fas fa-utensils'
        ]);
    }
}
