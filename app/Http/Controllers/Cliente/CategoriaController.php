<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{   
    /**
     * Api Rest SUBCATEGORIAS
     */
    public function apiSubcategoria(Categoria $categoria){
        return $categoria->subcategorias()->get([
            'subcategorias.id',
            'subcategorias.name',
        ]);
    }
}
