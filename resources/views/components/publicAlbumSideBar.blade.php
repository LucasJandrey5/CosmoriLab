<?php

use App\Models\Album;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Music;

$album = Album::find($idAlbum);

$album = DB::table('albums')
    ->join('music', 'albums.id', '=', 'music.id_album')
    /*->select('albums.*', 'music.musicType_String') */
    ->where('albums.id', '=', $idAlbum)
    ->get()[0];

$musics = DB::table('music')
    ->select('music.*')
    ->where('music.id_album', '=', $idAlbum)
    ->get();


?>

<link rel="stylesheet" href="https://allyoucan.cloud/cdn/icofont/1.0.1/icofont.css" integrity="sha384-jbCTJB16Q17718YM9U22iJkhuGbS0Gd2LjaWb4YJEZToOPmnKDjySVa323U+W7Fv" crossorigin="anonymous">
<link rel="stylesheet" href="{{ URL::asset('css/publicProfileSideBar.css') }}">


<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="osahan-account-page-left shadow-sm bg-white h-100">
                <div class="border-bottom p-4">
                    <div class="osahan-user text-center">
                        <div class="osahan-user-media">
                            <img class="mb-3 rounded-pill shadow-sm mt-1" src="<?php echo $album->cover_uri_string ?>" alt="gurdeep singh osahan">
                            <div class="osahan-user-media-body">
                                <h6 class="mb-2"><?php echo $album->name_string ?></h6>
                                <p class="mb-1"><?php echo $album->albumType_string ?></p>
                                <p><?php echo $album->gender_enum ?></p>
                                <p class="mb-0 text-black font-weight-bold"><a class="text-primary mr-3" data-toggle="modal" data-target="#edit-profile-modal" href="#"><i class="icofont-ui-edit"></i> EDIT</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs flex-column border-0 pt-4 pl-4 pb-4" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="albums-tab" data-toggle="tab" href="#" role="tab" aria-controls="albums" aria-selected="false"><i class="fas fa-archive"></i> Álbums</a>
                        <a class="nav-link" id="musics-tab" data-toggle="tab" href="#" role="tab" aria-controls="musics" aria-selected="false"><i class="fas fa-music"></i> Músicas</a>

                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="osahan-account-page-right shadow-sm bg-white p-4 h-100">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane  fade  active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                        <h4 class="font-weight-bold mt-0 mb-4">Últimas Músicas Desse Compositor</h4>

                        <div class="bg-white card mb-4 order-list border-0">


                           <x-publicAlbumListMusics idAlbum='<?php echo $idAlbum; ?>'/>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
