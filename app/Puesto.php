<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    protected $fillable = [
        'name', 'id', 'maxsubcategorias', 'precio_min', 'description', 'phone', 'phone2'
    ];
}
