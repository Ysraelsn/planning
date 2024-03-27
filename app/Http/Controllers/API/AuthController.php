<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
}