<?php

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Album;
use App\Models\Music;

$user = DB::table('users')
    ->join('albums', 'users.id', '=', 'albums.id_user')
    ->join('music', 'albums.id', '=', 'music.id_album')
    ->select('users.*')
    ->where('albums.id_user', '=', $idUser)
    ->get()[0];

$album = DB::table('users')
    ->join('albums','users.id', '=', 'albums.id_user')
    ->select('albums.*')
    ->where('albums.id_user', '=', $idUser)
    ->get()[0];


$musics = DB::table('users')
    ->join('albums', 'users.id', '=', 'albums.id_user')
    ->join('music', 'albums.id', '=', 'music.id_album')
    ->select('music.*')
    ->where('albums.id_user', '=', $idUser)
    ->orderBy('release_date', 'desc')
    ->get();

//dd($musics);
$count = 1;

foreach ($musics as $music) {
    if($count == 6)
    return;

    $url = "'".$music->song_youtube_url_string."'";
    $music_name = "'".$music->name_string."'";
    $composer_name = "'".$user->name_string."'";

    echo '
            <div class="mb-4 px-4 p-2 hover_gray d-flex justify-content-between shadow-sm">
            <div class=" d-flex align-items-center" style="flex-grow: 3;">
                <a href="#" id="" onclick="changeMusic('.$url.', '.$music_name.', '.$composer_name.')"><i class="fas fa-play-circle play_profile_icon"></i></a>
                <div>
                    <span class="index_text">' . $count . '</span>
                </div>
                <div class="flex-column align-items-center">
                    <div>
                        <a href="/track/' . $music->id . '"><span class="music_title">' . $music->name_string . '</span></a>
                    </div>
                    <div>
                    <a href="/album/' . $album->id . '"><span class="music_composer">' . $album->name_string . '</span></a>
                    </div>
                </div>

                <div class="d-flex justify-content-between " style="margin-left: auto">

                <div class="d-flex " style="height: 75px; margin-inline: 15px; margin-left: auto; ">
                    <div class="my_vr"></div>
                </div>

                <div class="flex-column align-items-center" style="margin: auto; margin-left: auto">
                    <div>
                        <span class="price_text">Preço: R$' . $music->price_decimal . '</span>
                    </div>
                    <div>
                        <span class="release_date_text">Release Date: ' . $music->release_date . '</span>
                    </div>
                </div>
                </div>
            </div>

            <div class="media d-flex align-items-center" style="margin-left: 20px">
                <div class="float-right flex-column justify-content-between mr-4">
                    <div>
                        <a class="btn btn-sm btn-outline-primary mb-1" href="#"><i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho</a>
                    </div>
                    <div>
                        <a class="btn btn-sm btn-primary mt-1" href="#"><i class="icofont-refresh"></i> Comprar</a>
                    </div>
                </div>

                <div class="">
                    <a><i class="fas fa-download right_icons"></i></a>
                    <a><i class="fas fa-ellipsis-h right_icons"></i></a>
                </div>
            </div>
        </div>
        ';
    $count++;
}
