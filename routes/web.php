<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/userList', function () {
    return view('userListPage');
});

Route::get('/analytics', function () {
    return view('analytics');
});

Route::get('/ADM-AREA', function () {
    return view('admin.index');
});

Route::get('/listData', function () {
    //$users = DB::table('users')->get();
    $users = User::all();

    //dd($users);
    return view('admin.listData', ['users' => $users, 'currentPage' => 1]);
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

Route::get('/teste', function () {
    return view('admin.login');
});
