<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials  = $validator->safe()->only(['email', 'password']);

        if(auth()->attempt($credentials)){
            $request->session()->regenerate();
            return to_route('dashboard');
        }
        return back()->with('status', 'Invalid login details');
        
    }
}
