<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function beranda(Request $request)
    {
        return view('pages.public.beranda.index');
    }
}
