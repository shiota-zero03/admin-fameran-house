<?php

namespace App\Process\Rules;

use Illuminate\Http\Request;

class WebOrderRules
{
    public function storeRules(Request $request)
    {
        return $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'whatsapp' => 'required',
            'message' => 'required',
        ]);
    }
}
