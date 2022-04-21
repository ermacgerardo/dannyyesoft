<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use DB;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;




     protected function reset(Request $request)
    {       

        $now = new \DateTime();
        


          $tokenCode=DB::table('app_change_password') 
                    ->select('token')  
                    ->where('token',$request->token)                           
                    ->first();
            $token = isset($tokenCode->token)?$tokenCode->token:null;

            $dateCode=DB::table('app_change_password') 
                    ->select('date')  
                    ->where('token',$request->token)    
                    ->whereDate('date',$now)                        
                    ->first();
            $date = isset($dateCode->date)?$dateCode->date:null;

            if ($token != null && $date != null) {

                return response()->json([
                    'token' => '1'            
                ]);
                
            }else{
                 
              

            }          

    }


    protected function change(Request $request)
    {       

        
                DB::table('users')
                ->where('email',$request->email)
                ->update(['password' => bcrypt($request->password)]);
           
                 
                return response()->json([
                    'message' => 'Unauthorized token'
                ], 401);

                    

    }





}
