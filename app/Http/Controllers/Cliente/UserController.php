<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Identidad;

class UserController extends Controller
{
    public function edit() {
        $tipoDocuments = Identidad::all();
        return view('cliente.update', compact('tipoDocuments'));
    }

    public function update(Request $request, User $usuario) {
        $rules = [
            'name'              =>  'required|min:3|max:45',
            'sur_name'          =>  'max:45',
            'identidad_id'      =>  'required',
            'ndocumento'        =>  'required|max:12',
            'address'           =>  'max:150',
            'email'             =>  'required|max:150',
        ];
        $this->validate($request, $rules);
        $usuario->name = $request->input('name');
        $usuario->sur_name = $request->input('sur_name');
        $usuario->identidad_id = $request->input('identidad_id');
        $usuario->ndocumento = $request->input('ndocumento');
        $usuario->address = $request->input('address');
        $usuario->email = $request->input('email');
        $usuario->save();

        $notification = 'Se ha actualizado Sus datos Correctamente';
        return redirect('/user')->with(compact('notification'));
    }
}
