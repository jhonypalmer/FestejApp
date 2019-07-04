<?php

namespace App\Http\Controllers;

use Firebase\JWT\JWT;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller;

class AuthController extends Controller
{
    protected function jwt(Usuario $usuario) {
        $payload = [
            'iss' => "lumen-jwt",
            'sub' => $usuario->id,
            'iat' => time(),
            'exp' => time() + 60*60
        ];
        
        return JWT::encode($payload, env('JWT_SECRET'));
    } 
    
    public function authenticate(Request $request) {
        $usuario = Usuario::where('email', $request->input('email'))->first();
        if (!$usuario) {
            return response()->json([
                'error' => 'Email não existe.'
            ], 400);
        }
        
        if (Hash::check($request->input('senha'), $usuario->senha)) {
            return response()->json([
                'token' => $this->jwt($usuario)
            ], 200);
        }
        
        return response()->json([
            'error' => 'Email e/ou senha estão errados.'
        ], 400);
    }
}