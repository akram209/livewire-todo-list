<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
    public function show(User $user)
    {
        return view('home', ['userId' => $user->id]);
    }
    public function completed(User $user)
    {
        return view('completed', ['user' => $user->id]);
    }
}
