<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


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
}
