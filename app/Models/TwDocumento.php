<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TwDocumento extends Model
{
    use HasFactory;
    protected $fillable = [
        'S_Nombre',
        'N_Obligatorio',
        'S_Descripcion'
    ];
    public $timestamps = false;
    public function twDocumentosCorporativo()
    {
        return $this->hasMany(TwDocumentoCorporativo::class,'tw_documentos_id', 'id');
    }
}
