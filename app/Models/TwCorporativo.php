<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Scopes\ActiveScope;

class TwCorporativo extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'S_NombreCorto',
        'S_NombreCompleto',
        'S_LogoUrl',
        'S_DBName',
        'S_DBUsuario',
        'S_DBPassword',
        'S_SystemUrl',
        'D_FechaIncorporacion',
        'tw_usuarios_id'
        
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'tw_usuarios_id','id');
    }
    
    public function twEmpresasCoporativo()
    {
        return $this->hasMany(TwEmpresaCorporativo::class,'tw_corporativos_id', 'id');
    }
    public function twContactosCorporativo()
    {
        return $this->hasMany(TwContactoCorporativo::class,'tw_corporativos_id', 'id');
    }
    public function twContratosCorporativo()
    {
        return $this->hasMany(TwContratoCorporativo::class,'tw_corporativos_id', 'id');
    }
    public function twDocumentosCorporativo()
    {
        return $this->hasMany(TwDocumentoCorporativo::class,'tw_corporativos_id', 'id');
    }
//    protected static function boot()
//    {
//        parent::boot();
//        static::addGlobalScope('active', function ($query) {
//            return $query;
//        });
//    }
}
