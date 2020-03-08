<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'cliente';

    protected $fillable = ['documento', 'nombre', 'apellido', 'nombre_completo', 'telefono', 'email', 'direccion', 'comment'];    
}
