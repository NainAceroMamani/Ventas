<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
    public function index() {
        $categorias = Categoria::all();
        return view('admin.categoria.index', compact('categorias'));
    }

    public function create() {
        return view('admin.categoria.create');
    }

    public function store(Request $request) {
        $rules = [
            'name'          =>  'required|min:3|max:25|regex:/^[\pL\s\-]+$/u',
            'description'   =>  'max:200',
        ];
        $this->validate($request, $rules);

        Categoria::create([
            'name'  => $request->input('name'),
            'descripcion' => $request->input('description')
        ]);

        $notification = 'Se ha creado la Categoria Correctamente';
        return redirect('/categoria/create')->with(compact('notification'));
    }

    public function edit(Categoria $categoria) {
        return view('admin.categoria.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria) {
        $rules = [
            'name'          =>  'required|min:3|max:25|regex:/^[\pL\s\-]+$/u',
            'description'   =>  'max:200',
        ];
        $this->validate($request, $rules);

        $categoria->name = $request->input('name');
        $categoria->descripcion = $request->input('description');
        $categoria->save();

        $notification = 'Se ha actualizado la Categoria Correctamente';
        return redirect('/categoria/'.$categoria->id.'/edit')->with(compact('notification'));
    }
}
