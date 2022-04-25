<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
Use Session;
use DB;
use Exception;
use Artisan;
use App\Traits\GlobalTrait;

class AppController extends Controller
{
    public function crearBackupAll(Request $request){
        $msgSuccess=Artisan::call('database:backup');
        $data['msgSuccess']=$msgSuccess;
        $code=200;
        $exceptions=null;
        return GlobalTrait::responseJSON($data, $exceptions, $code);
    }
    public function crearBackupOnlyTables(Request $request){
        $msgSuccess=Artisan::call('database:backup only_tables');
        $data['msgSuccess']=$msgSuccess;
        $code=200;
        $exceptions=null;
        return GlobalTrait::responseJSON($data, $exceptions, $code);
    }
    


  
   
}
