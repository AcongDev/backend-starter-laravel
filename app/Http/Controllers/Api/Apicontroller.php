<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class Apicontroller extends Controller
{
    // Register Api
    public function register(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|confirmed"
        ]);

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        return response()->json([
            "status" =>true,
            "message" => "User Registrated Successfully!"
        ]);
    }

    // Login Api
    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $token = JWTAuth::attempt([
            "email" => $request->email,
            "password" => $request->password
        ]);

        if(!empty($token)){
            return response()->json([
                "status" => true,
                "message" => "User logged  in successfully!",
                "token" => $token
            ]);
        }

        return response()->json([
            "status" => false,
            "message" => "Invalid details"
        ]);
    }

    // profile Api
    public function profile()
    {
        $userdata = auth()->user();
        return response()->json([
            "status" => true,
            "message" => "profile data",
            "data" => $userdata
        ]);
    }

    // Refresh Token Api
    public function refreshToken()
    {
        $token = JWTAuth::getToken();
        $newToken = JWTAuth::refresh($token, [], 10);
        
        return response()->json([
            "status" => true,
            "message" => "New access token",
            'token' => $newToken
        ]);
    }
    // logout api 
    public function logout()
    {
        auth()->logout();

        return response()->json([
            "status" => true,
            "message" => "User logged out successfully"
        ]);
    }
}
