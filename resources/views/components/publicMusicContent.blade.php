<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Album;
use App\Models\Music;

$musics = Album::find($idMusic);

$musics = DB::table('music')
    ->select('music.*')
    ->where('music.id', '=', $idMusic)
    ->get()[0];

$album = DB::table('albums')
    ->select('albums.*')
    ->where('albums.id', '=', ''.$musics->id_album.'')
    ->get()[0];

$user = DB::table('users')
    ->select('users.*')
    ->where('users.id', '=', ''.$album->id_user.'')
    ->get()[0];
?>

<link rel="stylesheet" href="https://allyoucan.cloud/cdn/icofont/1.0.1/icofont.css" integrity="sha384-jbCTJB16Q17718YM9U22iJkhuGbS0Gd2LjaWb4YJEZToOPmnKDjySVa323U+W7Fv" crossorigin="anonymous">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ URL::asset('css/publicMusicPage.css') }}">



<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="osahan-account-page-left shadow-sm bg-white h-100">
                <div class="border-bottom p-4">
                    <div class="osahan-user text-center">
                        <div class="osahan-user-media" id="esquerda">
                            <img class="mb-3 shadow-sm mt-1" src="<?php echo $musics->cover_uri_string ?>" alt="gurdeep singh osahan">
                            <div class="osahan-user-media-body">
                                <h3 class="mb-2"><?php echo $musics->name_string ?></h6>
                                <a href="/profile/<?php echo $user->id; ?>">
                                    <h5>Por <?php echo $user->name_string ?></h6>
                                </a>
                                <a href="#" id="albumSideBarPlayButtom" onclick=" ; return false;"><i class="fas fa-play-circle play_profile_icon"></i></a>
                                <hr>
                                <p class="mb-1"><?php echo $musics->description_string ?></p>

                                <hr>
                                    <h6 class="mb-1">R$ <?php echo $musics->price_decimal ?></h6>
                                <hr>

                                <div>
                                    <a class="btn btn-sm btn-outline-primary mb-1 btn_same_width" href="#"><i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho</a>
                                </div>
                                <div>
                                    <a class="btn btn-sm btn-primary mt-1 btn_same_width" href="#" style="margin-bottom: 0.5rem;"><i class="fas fa-credit-card"></i> Comprar agora</a>
                                </div>
                                <div>
                                    <a class="btn btn-sm btn-outline-primary mb-1 btn_same_width" href="/album/<?php echo $album->id; ?>"><i class="fas fa-credit-card"></i> Comprar o álbum inteiro</a>
                                </div>

                                <br>
                                <p>Lançado em <?php echo $musics->release_date ?>
                                <br>© Todos os direitos reservados.</p>

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


        <div class="col-md-4">
            <div class="osahan-account-page-left shadow-sm bg-white h-100">
                <div class="border-bottom p-4">
                    <div class="osahan-user text-center">
                        <div class="osahan-user-media" id="direita">
                            <h5 style="font-variant:small-caps;"> do álbum: </h5>
                            <a href="/album/<?php echo $album->id; ?>">
                                <img class="mb-3 shadow-sm mt-1" src="<?php echo $album->cover_uri_string ?>" alt="gurdeep singh osahan">
                            </a>
                            <div class="osahan-user-media-body">
                                <a href="/album/<?php echo $album->id; ?>">
                                    <h6 class="mb-2"><?php echo $album->name_string ?></h6>
                                </a>
                                <a href="/profile/<?php echo $user->id; ?>">
                                    <h6 style="font-size: .95rem;"><?php echo $user->name_string ?></h6>
                                </a>

                            </div>
                            
                            
                            <hr>
                            <p><b>Tags:</b><br><?php echo $musics->tags_string ?></p>
                            <hr>
                            <div>
                                <a class="outline-primary" href="#"><i class="fas fa-share"></i> Compartilhar</a>
                            </div>
                            <div>
                                <a class="outline-primary" href="#"><i class="fas fa-heart"></i> Adicionar à lista de desejos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        
    </div>
</div>
