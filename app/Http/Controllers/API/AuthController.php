<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
class AuthController extends Controller
{
    //Función de Registro de Usuario
    public function register(UserRequest $userRequest){
        $validatedData = $userRequest->validated();

        $validator = Validator::make($validatedData, [
            'password' => ['required','string','min:8'],
        ], [
            'password.min' => 'Password must be at least 8 characters long',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'Validation failed!',
                'errors' => $validator->errors()->first(),
            ],422);
        }
        $newUser = new User([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),

        ]);

        $newUser -> save();
        $newUserToken = $newUser->createToken('authToken')->plainTextToken;

        return response()->json([

            'message' => 'User created succesfully',
            'user' => $newUser,
            'token' => $newUserToken,


        ], 201);
    }

    //Función para Inicio de Sesión (Login).
    public function login(Request $request){
        $loginData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',

        ],[
            'email.required' => 'Email Address is required',
            'email.email' => 'Email Address is Invalid.',
            'password.required' => 'Password is required',

        ]);

        if(!auth()->attempt($loginData)){
            return response()->json([
                'messsage' => 'Invalid credentials',
            ],401); 
        }

        $user = User::where('email', $loginData['email']->firsOrFail());

        $userToken = $user->createToken('authToken') ->plainTextToken;

        return response()->json([
            'message' => 'Login Successful',
            'user' => $user,
            'token' => $userToken,
        ],200);
    }

    //Función para un cierre de sesión (Logout)
    public function logout(){
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'User logged out successfully'
        ],200);
    }
}