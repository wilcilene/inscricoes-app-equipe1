<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credenciais = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if (Auth::attempt($credenciais)) {

            $request->session()->regenerate();

            $user = Auth::user();

            // ADMIN
            if ($user->tipo_usuario_id == 1) {
                return redirect()->route('admin.dashboard');
            }

            // CANDIDATO
            if ($user->tipo_usuario_id == 2) {
                return redirect()->route('candidato.dashboard');
            }

            Auth::logout();

            return redirect('/')
                ->with('erro','Tipo inválido');
        }

        return back()
            ->withErrors([
                'email'=>'Login inválido'
            ]);
    }
}