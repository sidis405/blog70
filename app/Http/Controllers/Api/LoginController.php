<?php

namespace App\Http\Controllers\Api;

use JWTAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $token = null;

        //cerchiamo di loggarci e prendere token
        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json([
                'response' => 'error',
                'token' => 'invalid_credentials',
            ]);
        }
        //se non possibile dare messaggio di errore

        // diamo indietro il token
        return response()->json([
            'response' => 'success',
            'token' => $token,
        ]);
    }
}
