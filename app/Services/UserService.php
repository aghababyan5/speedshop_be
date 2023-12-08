<?php

namespace App\Services;

use App\Models\User;
use Symfony\Component\HttpFoundation\Request;

class UserService
{
    public function store($data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone_code' => $data['phone_code'],
            'phone' => $data['phone'],
            'password' => $data['password'],
            'street' => $data['street'] ?? null,
            'city' => $data['city'] ?? null,
            'post_code' => $data['post_code'] ?? null,
            'country' => $data['country'] ?? null,
            'state' => $data['state'] ?? null,
            'avatar' => $data['avatar'] ?? null,
            'avatar_original' => $data['avatar_original'] ?? null,
        ]);
    }

    public function logout(Request $request) {
        return $request->user()->token()->revoke();
    }

    public function getAuthUser() {
        return auth()->user();
    }
}
