<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', ['title' => 'Login - Séries e Filmes']);
    }

    public function auth(Request $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->back()->withErrors('Usuário ou senha inválidos!');
        }

        return to_route('series.listar');
    }

    public function registry()
    {
        return view('login.registry', ['title' => 'User Registry']);
    }

    public function register(Request $request)
    {
        $data = $request->except(['_token']);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        Auth::login($user);

        return to_route('series.listar');
    }

    public function logout()
    {
        Auth::logout();

        return to_route('login');
    }
}
