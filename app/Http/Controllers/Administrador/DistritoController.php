<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Distrito;
use App\Provincia;

class DistritoController extends Controller
{
    public function index() {
        $distritos = Distrito::all();
        return view('admin.distrito.index', compact('distritos'));
    }

    public function create() {
        $regions = Provincia::all();
        return view('admin.distrito.create', compact('regions'));
    }

    public function store(Request $request) {
        $rules = [
            'name'          =>  'required|min:3|max:25',
            'provincia_id'  =>  'required'
        ];
        $this->validate($request, $rules);

        Distrito::create([
            'nombre'  => $request->input('name'),
            'provincia_id' => $request->input('provincia_id')
        ]);

        $notification = 'Se ha creado el Distrito Correctamente';
        return redirect('/distrito/create')->with(compact('notification'));
    }

    public function edit(Distrito $distrito) {
        return view('admin.distrito.edit', compact('distrito'));
    }

    public function update(Request $request, Distrito $distrito) {
        $rules = [
            'name'          =>  'required|min:3|max:25',
            'provincia_id'  =>  'required'
        ];
        $this->validate($request, $rules);

        $distrito->nombre = $request->input('name');
        $distrito->provincia_id = $request->input('provincia_id');
        $distrito->save();

        $notification = 'Se ha actualizado el Distrito Correctamente';
        return redirect('/distrito/'.$distrito->id.'/edit')->with(compact('notification'));
    }
}
