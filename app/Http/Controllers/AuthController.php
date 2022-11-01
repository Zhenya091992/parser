<?php

namespace App\Http\Controllers;

use App\Models\User;
use Database\Factories\UserFactory;
use Faker\Factory;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function registration(RegisterUserRequest $request)
    {
        $user = User::create([
            'name' => $request->nameUser,
            'email' => $request->emailUser,
            'password' => Hash::make($request->passwordUser),
        ]);

        Auth::login($user);

        return redirect(route('cabinet', ['userName' => $user->name]));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user) {
            if (Hash::check($credentials['password'], $user->password)) {
                Auth::login($user);

                return redirect(route('cabinet', ['userName' => $user->name]));
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logOut(Request $request)
    {
        Auth::logout();

        var_dump($request->session()->invalidate());

        $request->session()->regenerateToken();

        return redirect(route('main'));
    }
}
