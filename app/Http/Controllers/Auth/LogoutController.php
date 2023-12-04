<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function __invoke(Request $request)
    {
        $this->service->logout($request);

        return response()->json([
           'message' => 'User logged out successfully'
        ]);
    }
}
