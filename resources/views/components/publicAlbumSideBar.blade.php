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

$user = DB::table('users')
    ->join('albums', 'users.id', '=', 'albums.id_user')
    ->select('users.*')
    ->where('albums.id_user', '=', $idAlbum)
    ->get()[0];
?>

<link rel="stylesheet" href="https://allyoucan.cloud/cdn/icofont/1.0.1/icofont.css" integrity="sha384-jbCTJB16Q17718YM9U22iJkhuGbS0Gd2LjaWb4YJEZToOPmnKDjySVa323U+W7Fv" crossorigin="anonymous">
<link rel="stylesheet" href="{{ URL::asset('css/publicProfileSideBar.css') }}">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<style>
    .file_manager .file a:hover .hover,
    .file_manager .file .file-name small {
        display: block
    }

    .file_manager .file {
        padding: 0 !important
    }

    .file_manager .file .icon {
        text-align: center
    }


    .file_manager .file {
        position: relative;
        border-radius: .55rem;
        overflow: hidden
    }

    .file_manager .file .image,
    .file_manager .file .icon {
        max-height: 120px;
        overflow: hidden;
        background-size: cover;
        background-position: top
    }

    .file_manager .file .hover {
        position: absolute;
        right: 10px;
        top: 10px;
        display: none;
        transition: all 0.2s ease-in-out
    }

    .file_manager .file a:hover .hover {
        transition: all 0.2s ease-in-out
    }

    .file_manager .file .icon {
        padding: 15px 10px;
        display: table;
        width: 100%
    }

    .file_manager .file .icon i {
        display: table-cell;
        font-size: 30px;
        vertical-align: middle;
        color: #777;
        line-height: 100px
    }

    .file_manager .file .file-name {
        padding: 10px;
        border-top: 1px solid #f7f7f7
    }

    .file_manager .file .file-name small .date {
        float: right
    }

    .folder {
        padding: 20px;
        display: block;
        color: #777
    }

    @media only screen and (max-width: 992px) {
        .file_manager .nav-tabs {
            padding-left: 0;
            padding-right: 0
        }

        .file_manager .nav-tabs .nav-item {
            display: inline-block
        }
    }

    .card {
        background: #fff;
        transition: .5s;
        border: 0;
        margin-bottom: 30px;
        border-radius: .55rem;
        position: relative;
        width: 100%;
        box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
    }

    a:hover {
        text-decoration: none;
    }
</style>


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
                                <a href="/profile/<?php echo $user->id; ?>">
                                    <h6 style="font-size: .95rem;"><?php echo $user->name_string ?></h6>
                                </a>
                                <p class="mb-1"><?php echo $album->albumType_string ?>, <?php echo $album->gender_enum ?></p>
                                <a href="#" id="playButtom" onclick=" ; return false;"><i class="fas fa-play-circle play_profile_icon"></i></a>
                                <hr>
                                <p class="mb-1"><?php echo $album->description_string ?></p>

                                <hr>
                                <div>
                                    <a class="btn btn-sm btn-outline-primary mb-1" href="#"><i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho</a>
                                </div>
                                <div>
                                    <a class="btn btn-sm btn-primary mt-1" href="#"><i class="icofont-refresh"></i> Comprar</a>
                                </div>


                                <hr>
                                <p class="mb-0 text-black font-weight-bold"><a class="text-primary mr-3" data-toggle="modal" data-target="#edit-profile-modal" href="#"><i class="icofont-ui-edit"></i> EDIT</a></p>
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