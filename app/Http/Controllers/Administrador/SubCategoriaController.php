<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subcategoria;
use App\Categoria;

class SubCategoriaController extends Controller
{
    public function index() {
        $subcategorias = Subcategoria::all();
        return view('admin.subcategoria.index', compact('subcategorias'));
    }

    public function create() {
        $categorias = Categoria::all();
        return view('admin.subcategoria.create', compact('categorias'));
    }

    public function store(Request $request) {
        $rules = [
            'name'          =>  'required|min:3|max:25|regex:/^[\pL\s\-]+$/u',
            'description'   =>  'max:200',
            'categoria_id'  =>  'required'
        ];
        $this->validate($request, $rules);

        Subcategoria::create([
            'name'  => $request->input('name'),
            'descripcion' => $request->input('description'),
            'categoria_id' => $request->input('categoria_id')
        ]);

        $notification = 'Se ha creado la SubCategoria Correctamente';
        return redirect('/subcategoria/create')->with(compact('notification'));
    }

    public function edit(Subcategoria $subcategoria) {
        $categorias = Categoria::all();
        return view('admin.subcategoria.edit', compact('categorias', 'subcategoria'));
    }

    public function update(Request $request, Subcategoria $subcategoria) {
        $rules = [
            'name'          =>  'required|min:3|max:25|regex:/^[\pL\s\-]+$/u',
            'description'   =>  'max:200',
            'categoria_id'  =>  'required'
        ];
        $this->validate($request, $rules);

        $subcategoria->name = $request->input('name');
        $subcategoria->descripcion = $request->input('descripcion');
        $subcategoria->categoria_id = $request->input('categoria_id');
        $subcategoria->save();

        $notification = 'Se ha actualizado la SubCategoria Correctamente';
        return redirect('/subcategoria/'.$subcategoria->id.'/edit')->with(compact('notification'));
    }
}
