<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\UserService;

class RegisterController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function __invoke(RegisterRequest $request)
    {
        $this->service->store($request->validated());

        return response()->json([
            'message' => 'User stored successfully'
        ]);
    }
}
