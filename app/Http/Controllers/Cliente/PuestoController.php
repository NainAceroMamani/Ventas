<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UsuarioPuesto;
use App\Puesto;
use App\Categoria;
use App\Subcategoria;
use App\PuestoSubcategoria;

class PuestoController extends Controller
{
    public function index() {
        $usuarios_puestos = UsuarioPuesto::where('usuario_id', auth()->user()->id)->get();
        return view('cliente.puestos.index', compact('usuarios_puestos'));
    }

    public function edit(Puesto $puesto) {
        $categorias = Categoria::all();

        $categoria_id = old('categoria_id');
        if ($categoria_id) {
            $categoria = Categoria::find($categoria_id);
            $subcategorias = $categoria->subcategorias;
        } else $subcategorias = collect();
        return view('cliente.puestos.edit', compact('puesto', 'categorias', 'subcategorias'));
    }

    public function update(Request $request, Puesto $puesto) {
        $rules = [
            'name'          =>  'required|min:3|max:100',
            'description'   =>  'max:200',
            'phone2'        =>  'max:14',
            'phone'         =>  'max:14'
        ];

        $this->validate($request, $rules);
        $puesto->name = $request->input('name');
        $puesto->description = $request->input('description');
        $puesto->phone2 = $request->input('phone2');
        $puesto->phone = $request->input('phone');
        $puesto->precio_min = $request->input('precio_min');
        $puesto->save();

        $subcategorias = $request->input('subcategoria_id');
        if($subcategorias != null) {
            $total =  ($puesto->maxsubcategorias >= count($subcategorias))? count($subcategorias) : $puesto->maxsubcategorias;
            $puesto->maxsubcategorias = $puesto->maxsubcategorias - $total;
            $puesto->save(); 
            
            for($i=0 ; $i < $total; ++$i) {
                PuestoSubcategoria::create([
                    "puesto_id"         =>  $puesto->id,
                    "subcategoria_id"   =>  $subcategorias[$i]
                ]);
            }
        }
        
        $notification = 'Se ha actualizado los datos de su puesto Correctamente';
        return redirect('/puesto/'.$puesto->id.'/edit')->with(compact('notification'));
    }
}
