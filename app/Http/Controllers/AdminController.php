<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Music;
use App\Models\Album;


class AdminController extends Controller
{
    public function ADMPage(){
        return view('admin.index');
    }

    public function PageListUserData(){
        //Recebe todos os dados dos usuarios
        $users = User::all();
        //Envia para a pagina lista usuarios os dados dos usuarios
        return view('admin.listUserData', ['users' => $users]);
    }

    public function PageListMusicData(){
        //Recebe todos os dados das músicas
        $musics = Music::all();
        //Envia para a pagina lista usuarios os dados dos usuarios
        return view('admin.listMusicData', ['musics' => $musics]);
    }

    public function PageListAlbumData(){
        //Recebe todos os dados das músicas
        $albums = Album::all();
        //Envia para a pagina lista usuarios os dados dos usuarios
        return view('admin.listMusicData', ['albums' => $albums]);
    }

    public function PageCreateNewUser(){
        return view('admin.createNewUser');
    }
}
