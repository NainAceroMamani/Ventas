<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TipoDocumento;

class TipoDocController extends Controller
{
    public function index() {
        $tipoDocs = TipoDocumento::all();
        return view('admin.tipoDoc.index', compact('tipoDocs'));
    }

    public function create() {
        return view('admin.tipoDoc.create');
    }

    public function store(Request $request) {
        $rules = [
            'descripcion'          =>  'required|min:3|max:120'
        ];
        $this->validate($request, $rules);

        Pais::create([
            'descripcion'  => $request->input('descripcion')
        ]);

        $notification = 'Se ha creado el Tipo de Documento Correctamente';
        return redirect('/tipoDoc/create')->with(compact('notification'));
    }

    public function edit(TipoDocumento $tipoDoc) {
        return view('admin.tipoDoc.edit', compact('tipoDoc'));
    }

    public function update(Request $request, TipoDocumento $tipoDoc) {
        $rules = [
            'descripcion'          =>  'required|min:3|max:120',
        ];
        $this->validate($request, $rules);

        $tipoDoc->descripcion = $request->input('descripcion');
        $tipoDoc->save();

        $notification = 'Se ha actualizado el Tipo de Documento Correctamente';
        return redirect('/tipoDoc/'.$tipoDoc->id.'/edit')->with(compact('notification'));
    }
}
