<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return inertia('CMS/LoginForm');
    }

    public function login(LoginRequest $request)
    {
        if (! Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return "Invalid credentials";
        }

        return redirect()->route('cms.homepage.show');
    }
}
