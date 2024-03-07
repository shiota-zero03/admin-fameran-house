<?php

namespace App\Process\Rules;

use Illuminate\Http\Request;

class AuthRules
{
    public function loginRules(Request $request)
    {
        return $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'email.email' => 'Email tidak valid'
        ]);
    }
}
