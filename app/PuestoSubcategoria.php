<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PuestoSubcategoria extends Model
{
    protected $fillable = [
        'puesto_id', 'subcategoria_id'
    ];

    public function subcategorias() {
        return $this->belongsTo(Subcategoria::class, 'subcategoria_id');
    }

    public function grupos() {
        return $this->hasMany(Grupo::class, 'puestosubcategoria_id');
    }

    public function productos() {
        return $this->hasMany(Producto::class);
    }
}
