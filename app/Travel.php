<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Travel extends Model
{
	
    protected $table = 'viajes';

    protected $fillable = ['email_cliente', 'pais', 'departamento', 'ciudad', 'fecha_viaje']; 
  
}
