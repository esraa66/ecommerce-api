<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $auth;

    public function __construct(AuthService $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle user registration
     */
    public function register(RegisterRequest $request)
    {
        $data = $this->auth->register($request->validated());

        return response()->json([
            'status' => true,
            'message' => 'User registered successfully.',
            'data' => $data,
        ], 201);
    }

    /**
     * Handle user login
     */
    public function login(LoginRequest $request)
    {
        $data = $this->auth->login($request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Login successful.',
            'data' => $data,
        ]);
    }

    /**
     * Logout user and revoke tokens
     */
    public function logout(Request $request)
    {
        $this->auth->logout($request->user());

        return response()->json([
            'status' => true,
            'message' => 'Logout successful.',
        ]);
    }

    /**
     * Get current authenticated user
     */
    public function profile(Request $request)
    {
        return response()->json([
            'status' => true,
            'data' => $request->user(),
        ]);
    }
}
