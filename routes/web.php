<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Models\Musica;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

Route::get('/', function () { return view('index'); });

Route::get('/login', [UserController::class, 'login'])->name('login.page');

Route::post('/login_auth', [UserController::class, 'Login_auth'])->name('login_auth.user');

Route::get('/register', [UserController::class, 'register'])->name('register.user');

Route::post('/register_auth', [UserController::class, 'register_auth'])->name('register_auth.user');

Route::get('/log-out', [UserController::class, 'logout'])->name('log-out.user');

Route::get('/profile/{id}', function ($id) {
    return view('publicProfilePage', ['id_user' => $id]);
});


Route::middleware(['admin'])->group(function () {
    Route::get('/adm', [AdminController::class, 'ADMPage'])->name('adm.page');

    Route::get('/listUserData', [AdminController::class, 'PageListUserData'])->name('listUserData.page');

    Route::get('/listMusicData', [AdminController::class, 'PageListMusicData'])->name('listMusicData.page');

    Route::get('/createNewUser', [AdminController::class, 'PageCreateNewUser'])->name('createNewUser.page');

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
});
