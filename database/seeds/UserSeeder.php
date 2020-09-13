<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Provincia::create([
            'name'      => 'Los Rios',
        ]);

        App\User::create([
            'cedula'      => '1206855593',
            'name'      => 'Martin',
            'apellido_pater'      => 'Ronquillo',
            'apellido_mater'      => 'Vargas',
            'direc'      => 'Pedro Carbo',
            'provincia_id'  =>  1,
            'tlf'      => '2735416',
            'email'     => 'marticarcel@hotmail.com',
            'password'     => bcrypt('123'),
        ]);

        App\User::create([
            'cedula'      => '1206855594',
            'name'      => 'Mariana',
            'apellido_pater'      => 'Quisirumbay',
            'apellido_mater'      => 'Armijo',
            'direc'      => 'Las Naves',
            'provincia_id'  =>  1,
            'tlf'      => '2735417',
            'email'     => 'mariana@gmail.com',
            'password'     => bcrypt('123'),
        ]);

        factory(App\User::class, 12)->create();
    }
}
