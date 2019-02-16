<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articulo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'Nombre_Articulo',
        'precio',
        'pais_origen',
        'observaciones',
        'seccion'
    ];

    protected $dates = ['deleted_at'];

}
