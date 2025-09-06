<?php

namespace App\Http\Controllers\API;
use App\Models\employees;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
   public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'firstName' => "required|max:255",
        'lastName' => "required|max:255",
        "email" => "required|email|unique:employees,email|max:255",
        "password" => "required|min:6|max:255",
        "role_id" => "required|exists:roles,id"
    ], [
        'firstName.required' => 'First name is required',
        'firstName.max' => 'First name cannot exceed 255 characters',
        'lastName.required' => 'Last name is required',
        'lastName.max' => 'Last name cannot exceed 255 characters',
        'email.required' => 'Email is required',
        'email.email' => 'Please enter a valid email address',
        'email.unique' => 'This email is already registered',
        'email.max' => 'Email cannot exceed 255 characters',
        'password.required' => 'Password is required',
        'password.min' => 'Password must be at least 6 characters',
        'password.max' => 'Password cannot exceed 255 characters',
        'role_id.required' => 'Role is required',
        'role_id.exists' => 'Selected role is invalid'
    ]);

    if ($validator->fails()) {
        return response()->json([
            "status" => 422,
            "message" => "Validation errors",
            "errors" => $validator->errors()
        ], 422); 
    }

    try {
        $newuser = employees::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "role_id" => $request->role_id
        ]);

        $token = $newuser->createToken("MyApp")->plainTextToken;

        $res = [
            "message" => "User registered successfully",
            "status" => 201, 
            "data" => [
                "user" => $newuser,
                "token" => $token
            ]
        ];
        
        return response()->json($res, 201);

    } catch (\Exception $e) {
        return response()->json([
            "status" => 500,
            "message" => "Server error: Unable to create user",
            "data" => null
        ], 500);
    }
}

public function login(Request $request)
{
    $validator = Validator::make($request->all(), [
        "email" => "required|email|max:255",
        "password" => "required|min:6|max:255"
    ], [
        'email.required' => 'Email is required',
        'email.email' => 'Please enter a valid email address',
        'email.max' => 'Email cannot exceed 255 characters',
        'password.required' => 'Password is required',
        'password.min' => 'Password must be at least 6 characters',
        'password.max' => 'Password cannot exceed 255 characters'
    ]);

    if ($validator->fails()) {
        return response()->json([
            "status" => 422,
            "message" => "Validation failed",
            "errors" => $validator->errors()
        ], 422); 
    }

    $user = employees::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        $token = $user->createToken("MyApp")->plainTextToken;

        $res = [
            "message" => "Login successful",
            "status" => 200, 
            "data" => [
                "user" => $user,
                "token" => $token
            ]
        ];
        return response()->json($res, 200);
    }
    
    return response()->json([
        "status" => 401,
        "message" => "Invalid email or password",
        "data" => null
    ], 401); 
}
}
