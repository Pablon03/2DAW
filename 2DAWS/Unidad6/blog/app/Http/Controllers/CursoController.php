<?php

namespace App\Http\Controllers;

use App\Http\Controllers\view;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index(){

        $cursos = Curso::paginate();
        return view('cursos.index', compact('cursos'));
    }

    public function store(Request $request){
        $curso = new Curso();
        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;

        $curso->save();

        return redirect()->route('cursos.show', $curso->id);
    }

    public function create(){
        return view('cursos.create');
    }

    public function show($id){

        $curso = Curso::find($id);
        return view('cursos.show', compact('curso'));
    }

}

