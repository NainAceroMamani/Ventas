<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function edit() {
        return view('cliente.update');
    }

    public function update(Request $request, User $usuario) {
        $rules = [
            'name'      =>  'required|min:3|max:45',
            'sur_name'  =>  'max:45',
            'dni'       =>  'required|max:9',
            'ruc'       =>  'max:15',
            'address'   =>  'max:150',
            'email'     =>  'required|max:150'
        ];
        $this->validate($request, $rules);
        $usuario->name = $request->input('name');
        $usuario->sur_name = $request->input('sur_name');
        $usuario->dni = $request->input('dni');
        $usuario->ruc = $request->input('ruc');
        $usuario->address = $request->input('address');
        $usuario->email = $request->input('email');
        $usuario->save();

        $notification = 'Se ha actualizado Sus datos Correctamente';
        return redirect('/user')->with(compact('notification'));
    }
}
