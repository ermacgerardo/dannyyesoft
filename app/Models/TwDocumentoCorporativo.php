<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TwDocumentoCorporativo extends Model
{
    use HasFactory;
    protected $table='tw_documentos_corporativos';
    public $timestamps = false;
    protected $fillable = [
            'tw_corporativos_id',
            'tw_documentos_id',
            'S_ArchivoUrl'
    ];
    public function corporativo()
    {
        return $this->belongsTo(TwCorporativo::class,'tw_corporativos_id','id');
    }
    public function documento()
    {
        return $this->belongsTo(TwDocumento::class,'tw_documentos_id','id');
    }
}
