<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create() {
        return view('login');
    }
    public function store() {
        $attibutes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        Auth::attempt($attibutes);
        request()->session()->regenerate();
        return redirect("/");
    }
    public function destroy() {
        Auth::logout();
        return redirect("/");
    }
    public function show(User $user) {
        return view('profile', [
            'user' => $user
        ]);
    }
}
