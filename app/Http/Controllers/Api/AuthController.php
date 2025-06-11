<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Aquí puedes generar un token si usas Sanctum o JWT
            // Ejemplo con Sanctum:
            // $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json(['success' => true], 200);
        }

        return response()->json(['success' => false, 'message' => 'Credenciales incorrectas'], 401);
    }
}