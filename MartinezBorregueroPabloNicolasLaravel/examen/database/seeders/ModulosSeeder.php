<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //guardar un solo registro
        DB::table('modulos')->insert([
            'nombre' => 'Despliegue de Aplicaciones Web',
        ]);

        DB::table('modulos')->insert([
            'nombre' => 'Diseño de Interfaz Web',
        ]);
    }
}
