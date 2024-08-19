<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function admin(UserRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (User::attempt($credentials)) {
            return redirect()->intended('admin');
        }
        return redirect()->back();
    }
    public function register(UserRequest $request)
    {
        $users = $request->only(['name', 'email', 'password']);

        return redirect('login');
    }
}
