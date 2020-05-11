<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'name' , 'description' , 'precio' , 'grupo_id' , 'stock'
    ];

    public function imagen_productos() {
        return $this->hasMany(ImagenProducto::class);
    }

    public function grupos() {
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }
}
