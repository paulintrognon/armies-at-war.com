<?php

namespace App\Services;

use \Auth;
use \Firebase\JWT\JWT;

class JwtService {
    public function generate()
    {
        if (!Auth::check()) {
            return;
        }
        $user = Auth::user();
        $token = [
            'user_id' => $user->id,
            'user_name' => $user->name,
        ];

        $key = env('APP_KEY');

        return JWT::encode($token, $key);
    }
}
