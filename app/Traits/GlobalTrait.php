<?php
namespace App\Traits;
use DB;
use Session;
use Exception;
use Illuminate\Support\Facades\Config;
use Auth;

use App\Models\User;
use App\Models\TwCorporativo;
use App\Models\TwDocumento;
use App\Models\TwDocumentoCorporativo;
use App\Models\TwContratoCorporativo;
use App\Models\TwContactoCorporativo;
use App\Models\TwEmpresasCorporativo;

trait GlobalTrait {
    
   
    public static function responseJSON($data,$exceptions,$code) {
        $msg=null;
        $success=null;
        if($exceptions!=null){
            //Si hay excepciones entonces entonces no se tuvo exito
            $msg="BAD";
            $success=false;
        }else{
            $msg="OK";
            $success=true;
        }
        $time_execution=(microtime(true)-LARAVEL_START)."s";
        if(is_string($code)){
            $code=400;
            
        }
        return response()->json([
                "msg"=>$msg,
                "success" => $success,
                "data"=>$data,
                "exceptions" => $exceptions,
                "time_execution" => $time_execution
            ],$code ?: 400);
    }
    
    public static function crearRegistros($numeroUsuarios){
        
        $users=User::factory()
            ->count($numeroUsuarios)
            //->hasCorporativos()
            ->create();
        
        $users->each(function ($user) {
            $documento=null;
            $documentos= TwDocumento::factory()
                ->count(1)
            ->create();
            
            $documentos->each(function ($d) {
                $documento=$d;
            });
            
            $corporativos=$user->corporativos()
                 ->saveMany(
                         TwCorporativo::factory(['tw_usuarios_id'=>$user->id])
                        ->count(1)
                        ->hasTwDocumentosCorporativo(['tw_documentos_id'=>1])
                         ->hasTwContratosCorporativo()
                         ->hasTwContactosCorporativo()
                         ->hasTwEmpresasCoporativo()
                        ->create()
                 );
//            $corporativos->each(function ($corporativo) {
//                $documento_corporativo=$corporativo->hasTwDocumentosCoporativo()
//                        ->saveMany(
//                                TwDocumentoCorporativo::factory(['tw_usuarios_id'=>$user->id])
//                                ->count(1)
//                                //->hasCorporativos()
//                                ->create()
//                        );
//            });
        });
        
 
    }
}