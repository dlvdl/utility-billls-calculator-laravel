<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SignUpRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signup(SignUpRequest $request)
    {
        /** @var \App\Models\User */
        $data = $request->validated();
        $user = User::create([
            "name" => $data["name"],
            "email" => $data["email"],
            "password" => bcrypt($data["password"])
        ]);

        $token = $user->createToken('main')->plainTextToken;
        return response(json_encode(compact('user', 'token')));
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (!Auth::attempt($credentials)) {
            return response(["message" => ["Provided email or password is incorrect"]], 401);
        }
        /** @var \App\Models\User */
        $user = Auth::user();
        $token = $user->createToken('main')->plainTextToken;
        return response(json_encode(compact('user', 'token')));
    }

    public function logout(Request $request)
    {

        $request->user()->currentAccessToken()->delete();
        return response('', 204);
    }
}