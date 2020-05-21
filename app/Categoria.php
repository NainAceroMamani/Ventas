<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'name', 'descripcion'
    ];
    public function subcategorias()
    {
        return $this->hasMany(Subcategoria::class);
    }
}
