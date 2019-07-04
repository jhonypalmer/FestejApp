<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use App\Models\Usuario;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;
use Illuminate\Http\Request;

class JwtMiddleware
{
    public function handle(Request $request, Closure $next, $guard = null)
    {
        $token = $request->header('Authorization');
        
        if(!$token) {
            return response()->json([
                'error' => 'Token não encontrado.'
            ], 401);
        }
        try {
            $credentials = JWT::decode(preg_replace('/Bearer\ /', '', $token), env('JWT_SECRET'), ['HS256']);
        } catch(ExpiredException $e) {
            return response()->json([
                'error' => 'Token Expirado.'
            ], 400);
        } catch(Exception $e) {
            return response()->json([
                'error' => 'Token não decodificável.'
            ], 400);
        }
        $user = Usuario::find($credentials->sub);
        $request->auth = $user;
        return $next($request);
    }
}