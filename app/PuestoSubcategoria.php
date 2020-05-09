<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PuestoSubcategoria extends Model
{
    protected $fillable = [
        'puesto_id', 'subcategoria_id'
    ];
}
