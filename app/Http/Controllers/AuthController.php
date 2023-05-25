<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'errors' => $validator->errors(),
            ], 403);
        }

        if(!Auth::attempt($request->only(['email', 'password']))){
            return response()->json([
                'message' => 'Email or Password Incorrect or Empty'
            ], 403);
        }

        $user = User::where('email', $request->email)->first();
        $token = $user->createToken("API TOKEN")->plainTextToken;

        return response()->json([
            'message' => 'Successfully logged in',
            'accessToken' => $token,
            'user'=>auth()->user()
        ], 200);
    }

    public function logout()
    {
        if(auth()->check()){
            auth()->user()->currentAccessToken()->delete();

            return response()->json([
                'message' => 'Successfully logged out'
            ], 200);
        }
    }

    public function me()
    {
        return response()->json([
            "user"=>auth()->user()
        ], 200);
    }

    public function allUser()
    {
        $user = User::all();
        return response()->json([
            'users' => $user
        ], 200);
    }
}
