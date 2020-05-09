<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioPuesto extends Model
{
    protected $fillable = [
        'usuario_id', 'puesto_id'
    ];

    public function puesto()
    {
        return $this->belongsTo(Puesto::class);
    }
}
