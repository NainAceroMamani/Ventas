<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenProducto extends Model
{
    protected $fillable = [
        'producto_id' , 'imagen'
    ];
}
