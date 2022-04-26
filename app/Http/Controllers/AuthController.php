<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use DB;
use Session;
use Exception;
use App\Models\sesion;
use App\Traits\GlobalTrait;

class AuthController extends Controller {
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] lastname
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */

    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $email = $request->email;

        $password = $request->password;

        $data = null;
        $exceptions = null;
        $arrayAccessToken = ['usuarios'];
        //Descomentar en caso de prueba
//        $arrayAccessToken = ['usuarios','corporativos',
//            'empresas-corporativos','contactos-corporativos','contratos-corporativos',
//            'documentos','documentos-corporativos'
//            ];
         

        //EN CASO DE PERMITIR LA AUTENTICACION CON USERNAME DESCOMENTAR
//        $queryUser = DB::select("select email from tw_usuarios where username=upper(:userName) or email=:userName", ['userName' => $username]);
//        foreach ($queryUser as $qu) {
//            $email = $qu->email;
//        }

        $credentials = ["email" => $email, "password" => $password];

        if (!Auth::attempt($credentials)) {
            throw new Exception('Unauthorized', 401);
        }

        $user = Auth::user();
        if ($user->tw_rol_id == 1) {
            array_push($arrayAccessToken, 'corporativos');
            array_push($arrayAccessToken, 'empresas-corporativos');
        } else if ($user->tw_rol_id == 2) {
            array_push($arrayAccessToken, 'contactos-corporativos');
            array_push($arrayAccessToken, 'contratos-corporativos');
        } else if ($user->tw_rol_id == 3) {
            array_push($arrayAccessToken, 'documentos');
            array_push($arrayAccessToken, 'documentos-corporativos');
        }
        $tokenResult = $user->createToken('Personal Access Token', $arrayAccessToken);
        $token = $tokenResult->token;
        
        if ($user->tw_rol_id == 1) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        } else if ($user->tw_rol_id == 2) {
            $token->expires_at = Carbon::now()->addWeeks(2);
        } else if ($user->tw_rol_id == 3) {
            $token->expires_at = Carbon::now()->addYears(1);
        }


        $token->save();

        $code = 200;

        $data['user'] = $user;
        $data['token'] = 'Bearer ' . $tokenResult->accessToken;

        return GlobalTrait::responseJSON($data, $exceptions, $code);
        
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request) {
        $request->user()->token()->revoke();
        
        
        $code = 200;

        $exceptions=null;
        $data['msgSuccess'] = 'Desautenticado exitosamente';

        return GlobalTrait::responseJSON($data, $exceptions, $code);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request) {
        
        $code = 200;

        $exceptions=null;
        $data['user'] = $request->user();

        return GlobalTrait::responseJSON($data, $exceptions, $code);

    }
    
    public function signup(Request $request)
    {
        //throw new Exception('No Implementado: Al parecer este servicio no es necesario para la prueba');
        
        $request->validate([
            'username' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
            'S_Nombre' => 'required|string',
            'S_Apellidos' => 'required|string',
            'tw_rol_id' => 'required|integer',
            
            
        ]);
        $user = new User([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'S_Nombre' => $request->S_Nombre,
            'S_Apellidos' => $request->S_Apellidos,
            'tw_rol_id' => $request->tw_rol_id,
        ]);        $user->save();        
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

}
