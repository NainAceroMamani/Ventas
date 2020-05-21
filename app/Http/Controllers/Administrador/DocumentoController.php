<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Documento;
use App\TipoDocumento;

class DocumentoController extends Controller
{
    public function index() {
        $documentos = Documento::all();
        return view('admin.documento.index', compact('documentos'));
    }

    public function create() {
        $puestos = Puesto::all();
        $tipodocumentos = TipoDocumento::all();
        return view('admin.documento.create', compact('puestos', 'tipodocumentos'));
    }

    public function store(Request $request) {
        $rules = [
            'titulo'          =>  'required|min:3|max:35',
            'description'     =>  'max:120',
            'puesto_id'       =>  'required',
            'tipodocumento_id'=>  'required'
        ];
        $this->validate($request, $rules);

        Documento::create([
            'titulo'  => $request->input('titulo'),
            'description' => $request->input('description'),
            'puesto_id' => $request->input('puesto_id'),
            'tipodocumento_id' => $request->input('tipodocumento_id'),
            'imagen' => $request->input('imagen')
        ]);

        $notification = 'Se ha creado el Documento Correctamente';
        return redirect('/documento/create')->with(compact('notification'));
    }

    public function edit(Documento $documento) {
        return view('admin.documento.edit', compact('documento'));
    }

    public function update(Request $request, Documento $documento) {
        $rules = [
            'titulo'          =>  'required|min:3|max:35',
            'description'     =>  'max:120',
            'puesto_id'       =>  'required',
            'tipodocumento_id'=>  'required'
        ];
        $this->validate($request, $rules);

        $documento->titulo = $request->input('titulo');
        $documento->description = $request->input('description');
        $documento->puesto_id = $request->input('puesto_id');
        $documento->tipodocumento_id = $request->input('tipodocumento_id');
        $documento->imagen = $request->input('imagen');
        $documento->save();

        $notification = 'Se ha actualizado el Documento Correctamente';
        return redirect('/documento/'.$tipoDoc->id.'/edit')->with(compact('notification'));
    }
}
