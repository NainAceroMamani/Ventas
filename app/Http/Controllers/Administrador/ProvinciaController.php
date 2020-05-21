<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Provincia;
use App\Region;
use App\Pais;

class ProvinciaController extends Controller
{
    public function index() {
        $provincias = Provincia::all();
        return view('admin.provincia.index', compact('provincias'));
    }

    public function create() {
        $paises = Pais::all();
        $regiones = collect();
        return view('admin.provincia.create', compact('regiones', 'paises'));
    }

    public function store(Request $request) {
        $rules = [
            'name'          =>  'required|min:3|max:25',
            'region_id'     =>  'required'
        ];
        $this->validate($request, $rules);

        Provincia::create([
            'nombre'  => $request->input('name'),
            'region_id' => $request->input('region_id')
        ]);

        $notification = 'Se ha creado la Provincia Correctamente';
        return redirect('/provincia/create')->with(compact('notification'));
    }

    public function edit(Provincia $provincia) {
        $regiones = Region::all();
        return view('admin.provincia.edit', compact('provincia', 'regiones'));
    }

    public function update(Request $request, Provincia $provincia) {
        $rules = [
            'name'          =>  'required|min:3|max:25',
            'region_id'     =>  'required'
        ];
        $this->validate($request, $rules);

        $provincia->nombre = $request->input('name');
        $provincia->region_id = $request->input('region_id');
        $provincia->save();

        $notification = 'Se ha actualizado la Provincia Correctamente';
        return redirect('/provincia/'.$provincia->id.'/edit')->with(compact('notification'));
    }
}
