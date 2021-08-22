<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        $user = User::query()->where('email', $credentials['email'])->first();
        $token = auth()->attempt($credentials);
        if (! $token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $data = ['token' => $token, 'user' => $user];
        return $this->responseData($data);
    }


    /**
     * @param Request $request
     */
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        try {
            $user = User::create($data);
            return $this->responseData($user);
        } catch (\Exception $e) {
            return $this->responseError($e->getMessage());
        }
    }
}
