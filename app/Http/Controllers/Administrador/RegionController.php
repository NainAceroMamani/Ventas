<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Region;
use App\Pais;

class RegionController extends Controller
{
    public function index() {
        $regiones = Region::all();
        return view('admin.region.index', compact('regiones'));
    }

    public function create() {
        $paises = Pais::all();
        return view('admin.region.create', compact('paises'));
    }

    public function store(Request $request) {
        $rules = [
            'name'          =>  'required|min:3|max:25',
            'pais_id'       =>  'required'
        ];
        $this->validate($request, $rules);

        Region::create([
            'nombre'  => $request->input('name'),
            'pais_id' => $request->input('pais_id')
        ]);

        $notification = 'Se ha creado la Región Correctamente';
        return redirect('/region/create')->with(compact('notification'));
    }

    public function edit(Region $region) {
        $paises = Pais::all();
        return view('admin.region.edit', compact('region', 'paises'));
    }

    public function update(Request $request, Region $region) {
        $rules = [
            'name'          =>  'required|min:3|max:25',
            'pais_id'       =>  'required'
        ];
        $this->validate($request, $rules);

        $region->nombre = $request->input('name');
        $region->pais_id = $request->input('pais_id');
        $region->save();

        $notification = 'Se ha actualizado la Region Correctamente';
        return redirect('/region/'.$region->id.'/edit')->with(compact('notification'));
    }

    //Api rest apiregiones
    public function apiregiones(Pais $pais) {
        return $pais->regions()->get([
            'regions.id',
            'regions.nombre',
        ]);
    }
}
