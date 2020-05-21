<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $fillable = [
        'tipodocumento_id', 'puesto_id', 'titulo', 'descripcion', 'imagen'
    ];
}
