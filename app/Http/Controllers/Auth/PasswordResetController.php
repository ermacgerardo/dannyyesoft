<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use App\Models\User;
use App\Models\PasswordReset;
use Illuminate\Support\Str;
use App\Traits\GlobalTrait;
class PasswordResetController extends Controller {

    /**
     * Create token password reset
     *
     * @param  [string] email
     * @return [string] message
     */
    public function create(Request $request) {
        $request->validate([
            'email' => 'required|string|email',
        ]);
        $user = User::where('email', $request->email)->first();
        
        $code=200;
        $exceptions=null;
        
        if (!$user){
            throw new Exception('Usuario no encontrado',404);
        }
            
        $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'token' => Str::random(60)
             ]
        );        
        if ($user && $passwordReset){
            $user->notify(
                new PasswordResetRequest($passwordReset->token)
            );        
            $data['msgSuccess']='Hemos enviado un correo electronico con un enlace para que puedas reestablecer tu contraseña';
            return GlobalTrait::responseJSON($data, $exceptions, $code);
            
        }
            
    }    /**
     * Find token password reset
     *
     * @param  [string] $token
     * @return [string] message
     * @return [json] passwordReset object
     */
    public function find($token)
    {
        $passwordReset = PasswordReset::where('token', $token)
            ->first();        
        $code=200;
        $exceptions=null;
        
        if (!$passwordReset){
            throw new Exception('El Token de reseteo de contraseña es invalido',404);
        }
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            throw new Exception('El Token de reseteo de contraseña es invalido',404);
        }        
        $data['password_reset']=$passwordReset;
        return GlobalTrait::responseJSON($data, $exceptions, $code);
    }     /**
     * Reset password
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @param  [string] token
     * @return [string] message
     * @return [json] user object
     */
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
            'token' => 'required|string'
        ]);
        $passwordReset = PasswordReset::where([
            ['token', $request->token],
            ['email', $request->email]
        ])->first();        
        $code=200;
        $exceptions=null;
        
        if (!$passwordReset){
            throw new Exception('EL token de reestablecimiento de contraseña es invalido.',404);
        }
        $user = User::where('email', $passwordReset->email)->first();        
        if (!$user){
            throw new Exception('Usuario no encontrado',404);
        }
            
        $user->password = bcrypt($request->password);
        $user->save();
        $passwordReset->delete();
        $user->notify(new PasswordResetSuccess($passwordReset));
        $data['user']=$user;
        return GlobalTrait::responseJSON($data, $exceptions, $code);
    }

}
