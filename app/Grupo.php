<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = [
        'puestosubcategoria_id', 'name', 'descripcion'
    ];

    
}
