<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function subcategorias()
    {
        return $this->hasMany(Subcategoria::class);
    }
}
