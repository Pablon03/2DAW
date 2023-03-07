<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlumnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //guardar un solo registro
        DB::table('alumnos')->insert([
            'nombre' => 'Álvaro',
            'apellidos' => 'Martín Martín',
            'email' => 'test1@test.com',
        ]);

        DB::table('alumnos')->insert([
            'nombre' => 'Pablo',
            'apellidos' => 'Apellido1 Apellido2',
            'email' => 'test2@test.com',
        ]);

        DB::table('alumnos')->insert([
            'nombre' => 'Nombre3',
            'apellidos' => 'Crespo Crespo',
            'email' => 'test3@test.com',
        ]);


        DB::table('alumnos')->insert([
            'nombre' => 'Nombre4',
            'apellidos' => 'Apellido4 Apellido4',
            'email' => 'test4@test.com',
        ]);

        DB::table('alumnos')->insert([
            'nombre' => 'Nombre5',
            'apellidos' => 'Apellido5 Apellido5',
            'email' => 'test5@test.com',
        ]);

        DB::table('alumnos')->insert([
            'nombre' => 'Nombre6',
            'apellidos' => 'Apellido6 Apellido6',
            'email' => 'test6@test.com',
        ]);
    }
}
