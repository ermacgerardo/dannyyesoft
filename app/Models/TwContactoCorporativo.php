<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TwContactoCorporativo extends Model
{
    use HasFactory;
    protected $table="tw_contactos_corporativos";
    public $timestamps = false;
    protected $fillable = [
            'S_Nombre',
            'S_Puesto',
            'S_Comentarios',
            'S_TelefonoFijo',
            'S_TelefonoMovil',
            'S_Email',
            'tw_corporativos_id',
    ];
    public function corporativo()
    {
        return $this->belongsTo(TwCorporativo::class,'tw_corporativos_id','id');
    }
}
