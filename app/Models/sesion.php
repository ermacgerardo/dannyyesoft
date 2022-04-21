<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sesion extends Model
{
  

    protected $fillable = [
    'usuario_intento', 'contraseña_intento', 'ip_compartida','ip_proxi','ip_real','app_intento','exito_intento','ubicacion','navegador','agente'
    ];

    protected  $table='tbl_utic_intentos_logeos';
}
