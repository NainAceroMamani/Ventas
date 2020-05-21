<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pais;

class PaisController extends Controller
{
    public function index() {
        $paises = Pais::all();
        return view('admin.pais.index', compact('paises'));
    }

    public function create() {
        return view('admin.pais.create');
    }

    public function store(Request $request) {
        $rules = [
            'name'          =>  'required|min:3|max:25'
        ];
        $this->validate($request, $rules);

        Pais::create([
            'nombre'  => $request->input('name')
        ]);

        $notification = 'Se ha creado el Pais Correctamente';
        return redirect('/pais/create')->with(compact('notification'));
    }

    public function edit(Pais $pais) {
        return view('admin.pais.edit', compact('pais'));
    }

    public function update(Request $request, Pais $pais) {
        $rules = [
            'name'          =>  'required|min:3|max:25',
        ];
        $this->validate($request, $rules);

        $pais->nombre = $request->input('name');
        $pais->save();

        $notification = 'Se ha actualizado el Pais Correctamente';
        return redirect('/pais/'.$pais->id.'/edit')->with(compact('notification'));
    }
}
