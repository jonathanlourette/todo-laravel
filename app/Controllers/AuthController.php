<?php

declare(strict_types=1);

namespace App\Controllers;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    public function show(): mixed
    {
        if ($this->guard()->check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    public function login(Request $request): mixed
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

            /** @var \App\Domains\User\User $user  */
            $user = $this->guard()->user();

            if (!$user->active) {
                $this->guard()->logout();
                return back()->with('warning', 'Usuário ou senha inválidos...')->onlyInput('email');
            }

            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()->with('warning', 'Usuário ou senha inválidos.')->onlyInput('email');
    }

    public function logout(Request $request): mixed
    {
        $this->guard()->logout();
        return redirect()->route('login');
    }

    private function guard(): StatefulGuard
    {
        return Auth::guard('web');
    }
}
