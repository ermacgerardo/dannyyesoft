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
        $username = request('email');
        $email = null;
        $password = request('password');
        $queryUser = DB::select("select email from users where username=upper(:userName) or email=:userName", ['userName' => $username]);
        foreach ($queryUser as $qu) {
            $email = $qu->email;
        }

        $credentials = ["email" => $email, "password" => $password];

        if (!Auth::attempt($credentials))
            return response()->json([
                        'message' => 'Unauthorized',
                        'name' => '',
                        'token' => ''
                            ], 401);




        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
                    'message' => 'Authorized',
                    'name' => Auth::user()->name,
                    //'qr'=>Auth::user()->qr,
                    //'access_token' => $tokenResult->accessToken,
                    //'token_type' => 'Bearer',
                    'token' => 'Bearer ' . $tokenResult->accessToken,
                        //'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
        ]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request) {
        $request->user()->token()->revoke();
        return response()->json([
                    'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request) {

        return response()->json($request->user());
    }

}
