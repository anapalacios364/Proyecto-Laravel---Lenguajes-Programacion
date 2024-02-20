<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class recetitas extends Model
{
    use HasFactory;

    /*camila*/

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'comentario',
    ];
}
