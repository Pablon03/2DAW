<?php

namespace App\Http\Controllers;

use App\Http\Controllers\view;
use App\Models\Curso;
use Illuminate\Contracts\View\View as ViewView;
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
        $curso->description = $request->description;
        $curso->categoria = $request->categoria;

        $curso->save();

        return redirect(route('curso.view', $curso->id));
    }

    public function create(){
        return view('cursos.create');
    }

    public function show(Curso $curso){

        return view('cursos.show', compact('curso'));
    }

    public function edit(Curso $curso){
        return view('cursos.edit', compact('curso'));
    }

    public function update(Request $request, Curso $curso){
        $curso->name = $request->name;
        $curso->description = $request->description;
        $curso->categoria = $request->categoria;

        return $curso;
    }
}