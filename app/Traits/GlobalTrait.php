<?php
namespace App\Traits;
use DB;
use Session;
use Exception;
use Illuminate\Support\Facades\Config;
use Auth;



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
}