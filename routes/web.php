<?php

use App\Models\Musica;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/userList', function () {
    return view('userListPage');
});

Route::get('/analytics', function () {
    return view('analytics');
});

Route::get('/adm', function () {
    return view('admin.index');
});

Route::get('/listUserData', function () {
    //Recebe todos os dados dos usuarios
    $users = User::all();
    //Envia para a pagina lista usuarios os dados dos usuarios
    return view('admin.listUserData', ['users' => $users]);
});

Route::get('/listMusicData', function () {
    $musics = Musica::all();

    //Envia para a pagina lista usuarios os dados dos usuarios
    return view('admin.listMusicData', ['musics' => $musics]);
});

Route::get('/createNewUser', function () {
    return view('admin.createNewUser');
});

Route::post('/createdNewUser', function (Request $request) {
    //Criando novo usuario pelo admin panel no banco de dados
    User::create([
        'name_string' => $request->name,
        'email_string' => $request->email,
        'password_string' => $request->password,
        'phone_string' => $request->phone,
        'access_level_enum' => $request->access_level_enum,
        'birth_date' => $request->birthday
    ]);

    echo 'Usuario criado com sucesso.';
});
