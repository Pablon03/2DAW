<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use App\Models\Alumno;
use App\Models\ModuloAlumno;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAlumnos(Modulo $modulo)
    {
        // return $id;

        // $modulo = Modulo::where('modulo_id', $modulo->id)->get();
        // $alumnos = $modulo->alumnos;

        $alumnos = DB::table('alumnos')
            ->join('modulo_alumno', 'alumnos.id', '=', 'modulo_alumno.alumno_id')
            ->join('modulos', 'modulo_alumno.modulo_id', '=', 'modulos.id')
            ->where('modulos.id', '=', $modulo->id)
            ->select('alumnos.*')
            ->get();

        return view('modulos.alumnos', compact('alumnos', 'modulo'));
    }


    public function agregar(Request $request, $id)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:alumnos,email,NULL,id,modulo_id,' . $id
        ]);
    
        $alumno = new Alumno();
        $alumno->nombre = $request->input('nombre');
        $alumno->apellidos = $request->input('apellidos');
        $alumno->email = $request->input('email');
        $alumno->save();

        $moduloAlumno = new ModuloAlumno();
        $moduloAlumno->modulo_id = $id;
        $moduloAlumno->alumno_id = $alumno->id;
        $moduloAlumno->save();
    
        return redirect()->route('modulos.alumnos', $id)->with('success', 'Alumno añadido correctamente.');
    }
}
