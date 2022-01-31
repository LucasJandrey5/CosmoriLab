<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Album;
use App\Models\Music;

$album = Album::find($idAlbum);

$album = DB::table('albums')
    ->join('music', 'albums.id', '=', 'music.id_album')
    ->select('albums.*')
    ->where('albums.id', '=', $idAlbum)
    ->get()[0];

$musics = DB::table('music')
    ->select('music.*')
    ->where('music.id_album', '=', $idAlbum)
    ->get();

$user = DB::table('users')
    ->select('users.*')
    ->where('users.id', '=', '' . $album->id_user . '')
    ->get()[0];
?>

<link rel="stylesheet" href="https://allyoucan.cloud/cdn/icofont/1.0.1/icofont.css" integrity="sha384-jbCTJB16Q17718YM9U22iJkhuGbS0Gd2LjaWb4YJEZToOPmnKDjySVa323U+W7Fv" crossorigin="anonymous">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ URL::asset('css/publicAlbumSideBar.css') }}">



<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="osahan-account-page-left shadow-sm bg-white h-100">
                <div class="border-bottom p-4">
                    <div class="osahan-user text-center">
                        <div class="osahan-user-media">
                            <img class="mb-3 shadow-sm mt-1" src="<?php echo $album->cover_uri_string ?>" alt="gurdeep singh osahan">
                            <div class="osahan-user-media-body">
                                <h6 class="mb-2"><?php echo $album->name_string ?></h6>
                                <a href="/profile/<?php echo $user->id; ?>">
                                    <h6 style="font-size: .95rem;"><?php echo $user->name_string ?></h6>
                                </a>
                                <p class="mb-1"><?php echo $album->albumType_string ?>, <?php echo $album->gender_enum ?></p>
                                <a href="#" id="albumSideBarPlayButtom" onclick=" ; return false;"><i class="fas fa-play-circle play_profile_icon"></i></a>
                                <hr>
                                <p class="mb-1"><?php echo $album->description_string ?></p>

                                <hr>

                                <p class="mb-1">R$ <?php echo $album->price_decimal ?></p>

                                <div>
                                    <a class="btn btn-sm btn-outline-primary mb-1 btn_same_width" href="#"><i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho</a>
                                </div>
                                <div>
                                    <a class="btn btn-sm btn-primary mt-1 btn_same_width" href="#"><i class="fas fa-credit-card"></i> Comprar agora</a>
                                </div>
                                <hr>

                                <div>
                                    <a class="outline-primary" href="#"><i class="fas fa-share"></i> Compartilhar</a>
                                </div>
                                <div>
                                    <a class="outline-primary" href="#"><i class="fas fa-heart"></i> Adicionar à lista de desejos</a>
                                </div>

                                <hr>
                                <?php
                                if (Auth::check()) {
                                    if ($user->id == Auth::user()->id) {
                                        echo '<p class="mb-0 text-black font-weight-bold"><a class="text-primary mr-3" data-toggle="modal" data-target="#edit-profile-modal" href="#"><i class="icofont-ui-edit"></i> EDIT</a></p>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
        <div class="col-md-9">
            <div class="osahan-account-page-right shadow-sm bg-white p-4 h-100">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane  fade  active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">


                        <div class="bg-white card mb-4 order-list border-0">

                            <div id="main-content" class="file_manager">
                                <div class="container">
                                    <div class="row clearfix">
                                        <x-publicAlbumListMusics idAlbum='<?php echo $idAlbum; ?>' />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>