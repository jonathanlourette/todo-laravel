<?php

declare(strict_types=1);

namespace App\Controllers;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    public function show()
    {
        if ($this->guard()->check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email' => [
                'required' => 'Email é obrigatório!',
                'email' => 'Formato endereço email invalido!'
            ],
            'password' => [
                'required' => 'Senha é obrigatória!'
            ],
        ]);

        // Clear last active sessions to avoid conflicts.
        $request->session()->flush();

        if ($this->guard()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'Usuário ou senha inválidos.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        return redirect()->route('login');
    }

    private function guard(): StatefulGuard
    {
        return Auth::guard('web');
    }
}
