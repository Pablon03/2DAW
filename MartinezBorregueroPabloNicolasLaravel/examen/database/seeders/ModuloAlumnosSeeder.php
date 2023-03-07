<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ModuloAlumnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modulo_alumno')->insert([
            'modulo_id' => '1',
            'alumno_id' => '1',
        ]);
        DB::table('modulo_alumno')->insert([
            'modulo_id' => '1',
            'alumno_id' => '2',
        ]);
        DB::table('modulo_alumno')->insert([
            'modulo_id' => '1',
            'alumno_id' => '3',
        ]);
        DB::table('modulo_alumno')->insert([
            'modulo_id' => '2',
            'alumno_id' => '4',
        ]);
        DB::table('modulo_alumno')->insert([
            'modulo_id' => '2',
            'alumno_id' => '5',
        ]);
        DB::table('modulo_alumno')->insert([
            'modulo_id' => '2',
            'alumno_id' => '6',
        ]);
    }
}
