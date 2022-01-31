<?php

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Album;
use App\Models\Music;




$musics = DB::table('albums')
    ->join('music', 'albums.id', '=', 'music.id_album')
    ->select('music.*')
    ->where('music.id_album', '=', $idAlbum)
    ->orderBy('release_date', 'desc')
    ->get();


$user = DB::table('users')
    ->join('albums', 'users.id', '=', 'albums.id_user')
    ->select('users.*')
    ->where('users.id', '=', $idAlbum)
    ->get()[0];


$count = 1;

foreach ($musics as $music) {
    $url = "'" . $music->song_youtube_url_string . "'";
    $music_name = "'" . $music->name_string . "'";
    $composer_name = "'" . $user->name_string . "'";

    echo '

    <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="file">
                            <a href="javascript:void(0);">
                                <div class="hover">
                                    <button type="button" class="btn btn-icon btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                                <div class="image">
                                    <img src="' . $music->cover_uri_string . '" alt="img" class="img-fluid">

                                </div>
                                <div class="file-name">
                                    <a href="track/' . $music->id . '">
                                    <p class="m-b-5 text-muted" style="margin-bottom: 1px;">' . $count . '. ' . $music->name_string . '</p></a>
                                    <small class="date text-muted"> ' . $music->duration_time . ' </small>
                                    <small> R$' . $music->price_decimal . '<span class="date text-muted">' . $music->release_date . '</span></small>
                                    <small> Tocada ' . $music->amount_played_int . ' vezes </small>
                                </div>
                                <div class="file-name d-flex justify-content-center">
                                    <a onclick="changeMusic(' . $url . ', ' . $music_name . ', ' . $composer_name . ')"><i class="fas fa-play-circle right_icons"></i></a>
                                    <a href=""><i class="fas fa-download right_icons"></i></a>
                                    <a href=""><i class="fas fa-ellipsis-h right_icons"></i></a>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

        ';
    $count++;
}
