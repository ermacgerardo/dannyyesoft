<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TwEmpresaCorporativo extends Model
{
    use HasFactory, SoftDeletes;
    protected $table='tw_empresas_corporativos';
    protected $fillable = [
            'S_RazonSocial',
            'S_RFC',
            'S_Pais',
            'S_Estado',
            'S_Municipio',
            'S_ColoniaLocalidad',
            'S_Domicilio',
            'S_CodigoPostal',
            'S_UsoCFDI',
            'S_UrlRFC',
            'S_UrlActaConstitutiva',
            'S_Activo',
            'S_Comentarios',
            'tw_corporativos_id',
    ];
    public function corporativo()
    {
        return $this->belongsTo(TwCorporativo::class,'tw_corporativos_id','id');
    }
}
