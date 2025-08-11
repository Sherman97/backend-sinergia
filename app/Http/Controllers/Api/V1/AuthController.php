<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(private AuthService $service) {}

    public function login(LoginRequest $request): JsonResponse
    {
        $result = $this->service->login($request->validated());
        return response()->json($result, 200);
    }

    public function me(Request $request): JsonResponse
    {
        return response()->json($request->user());
    }

    public function logout(Request $request): JsonResponse
    {
        $this->service->logout($request->user());
        return response()->json(['message' => 'Logged out'], 204);
    }

    public function logoutAll(Request $request): JsonResponse
    {
        $this->service->logoutAll($request->user());
        return response()->json(['message' => 'Logged out from all devices'], 204);
    }
}
