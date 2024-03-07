<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Process\Rules\AuthRules;

use Cookie, Auth;

class AuthController extends Controller
{
    protected $rules;
    public function __construct(AuthRules $rules)
    {
        $this->rules = $rules;
    }
    public function login_process(Request $request)
    {
        $this->rules->loginRules($request);
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
    		if(auth()->user()->role != 1){
    			Auth::logout();
    			return back()->with('error', 'This page just can view by admin');
    		}
    		return redirect()->intended(route('admin.beranda'));
    	} else {
    		return back()->with('error', 'Email atau password anda tidak sesuai');
    	}
        // if($request->remember){

        // }
    }
}
