<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request)
    {
        //email e senha sao obrigatorios 
        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Campo email é obrigatório',
            'email.email' => 'o Campo email não é valido',
            'password.required' => 'Campo senha é obrigatório'
        ]);

        // verifica se as credencias batem com as que tem no banco de dados e inicia uma nova sessao 
        if(Auth::attempt($credenciais, $request->remember)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin/dashboard');
        } else {
            return redirect()->back()->with('erro', 'Email ou senha Invalidos');
        }
    }

    //deslogar usuario 
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate(); // invalida a sessao antiga 
        $request->session()->regenerateToken(); //regenera uma nova sessao 
        return redirect(route('site.index')); //redireciona para a index 
    }

    public function create()
    {
        return view('login.create');
    }
}
