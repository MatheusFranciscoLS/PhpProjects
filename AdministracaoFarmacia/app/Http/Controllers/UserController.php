<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Exibir o formulário de login
    public function showLoginForm()
    {
        return view('usuarios.login');
    }

    // Processar o login do usuário
    public function login(Request $request)
    {
        // Valida as credenciais
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Tenta autenticar o usuário
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Regenera a sessão para prevenir ataques de fixação de sessão

            return redirect()->intended('/dashboard')->with('success', 'Você está logado com sucesso!');
        }

        // Se a autenticação falhar, redireciona de volta com uma mensagem de erro
        return back()->withErrors([
            'email' => 'As credenciais não correspondem aos nossos registros.',
        ])->onlyInput('email');
    }

    // Exibir o formulário de registro
    public function showRegistroForm()
    {
        return view('usuarios.registro');
    }

    // Processar o registro de um novo usuário
    public function registro(Request $request)
    {
        // Valida os dados do formulário de registro
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Cria o novo usuário
        $usuario = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Autentica o usuário e redireciona para o dashboard
        Auth::login($usuario);

        return redirect('/dashboard')->with('success', 'Cadastro realizado com sucesso!');
    }

    // Realizar o logout do usuário
    public function logout(Request $request)
    {
        Auth::logout();

        // Regenera o token da sessão e invalida a sessão
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
