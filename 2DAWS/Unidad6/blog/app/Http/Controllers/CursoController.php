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
<<<<<<< HEAD
        $curso->descripcion = $request->descripcion;
=======
        $curso->description = $request->description;
>>>>>>> 810357b40b069f61e1bd079a2daf10d027802808
        $curso->categoria = $request->categoria;

        $curso->save();

<<<<<<< HEAD
        return redirect()->route('cursos.show', $curso->id);
=======
        return redirect(route('curso.view', $curso->id));
>>>>>>> 810357b40b069f61e1bd079a2daf10d027802808
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