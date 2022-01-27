<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\Email;

class UserController extends Controller
{
    public function login(){
        return view('login');
    }


    public function auth(Request $request){

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

        }else {
            return redirect()->back()->with('danger', 'Email ou senha inválida');
        }
    }
}
