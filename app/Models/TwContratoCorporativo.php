<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TwContratoCorporativo extends Model
{
    use HasFactory;
    protected $table="tw_contratos_corporativos";
    public $timestamps = false;
    protected $fillable = [
            'D_FechaIncorporacion',
            'D_FechaFin',
            'S_URLContrato',
            'tw_corporativos_id',
    ];
    public function corporativo()
    {
        return $this->belongsTo(TwCorporativo::class,'tw_corporativos_id','id');
    }
}
