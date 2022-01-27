<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\Email;
use App\Models\User;

class UserController extends Controller
{
    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }


    public function Login_auth(Request $request){

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'O campo Email é obrigatório',
            'password.required' => 'O campo Senha é obrigatório'
        ]);

        $credentials = [
            'email_string' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($credentials, $request->remember)) {
            return redirect()->to('/');
        }else {
            return redirect()->back()->with('danger', 'Email ou senha inválida');
        }
    }

    public function register_auth(Request $request) {
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ], [
            'username' => 'O campo Username é obrigatório',
            'email.required' => 'O campo Email é obrigatório',
            'password.required' => 'O campo Senha é obrigatório'
        ]);

        $credentials = [
            'name_string' => $request->username,
            'email_string' => $request->email,
            'password' => bcrypt($request->password),
            'access_level_enum' => 'USER'
        ];

        $user = User::create($credentials);

        auth()->login($user);

        return redirect()->to('/');
    }

    public function Logout(Request $request) {
        Auth::logout();
        return redirect()->to('/');
    }
}
