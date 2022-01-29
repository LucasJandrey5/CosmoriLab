<?php

use App\Models\Album;
use Illuminate\Support\Facades\DB;
use App\Models\User;

$user = User::find($idUser);

$user = DB::table('users')
            ->join('albums', 'users.id', '=', 'albums.id_user')
            ->select('users.*', 'albums.albumType_String')
            ->where('users.id', '=', $idUser)
            ->get()[0];

$albums = DB::table('albums')
            ->select('albums.*')
            ->where('albums.id_user', '=', $idUser)
            ->get();

$musics = DB::table('users')
            ->join('albums', 'users.id', '=', 'albums.id_user')
            ->join('music', 'albums.id', '=', 'music.id_album')
            ->select('music.*')
            ->where('albums.id_user', '=', $idUser)
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
                            <img class="mb-3 rounded-pill shadow-sm mt-1" src="<?php echo $user->uri_photo_string ?>" alt="gurdeep singh osahan">
                            <div class="osahan-user-media-body">
                                <h6 class="mb-2"><?php echo $user->name_string ?></h6>
                                <p class="mb-1"><?php echo $user->phone_string ?></p>
                                <p><?php echo $user->email_string ?></p>
                                <p class="mb-0 text-black font-weight-bold"><a class="text-primary mr-3" data-toggle="modal" data-target="#edit-profile-modal" href="#"><i class="icofont-ui-edit"></i> EDIT</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs flex-column border-0 pt-4 pl-4 pb-4" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="icofont-food-cart"></i> Orders</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="osahan-account-page-right shadow-sm bg-white p-4 h-100">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane  fade  active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                        <h4 class="font-weight-bold mt-0 mb-4">Past Orders</h4>
                        <div class="bg-white card mb-4 order-list shadow-sm">
                            <div id="player">
                                <iframe width="0" height="0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            </div>
                            <div class="gold-members p-4">
                                <a href="#">
                                </a>
                                <div class="media">
                                    <a href="#">
                                        <img class="mr-4" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="Generic placeholder image">
                                    </a>
                                    <div class="media-body">
                                        <a href="#">
                                            <span class="float-right text-info">Delivered on Mon, Nov 12, 7:18 PM <i class="icofont-check-circled text-success"></i></span>
                                        </a>
                                        <h6 class="mb-2">
                                            <a href="#"></a>
                                            <a href="#" class="text-black">Gus's World Famous Fried Chicken</a>
                                        </h6>
                                        <p class="text-gray mb-1"><i class="icofont-location-arrow"></i> 730 S Mendenhall Rd, Memphis, TN 38117, USA
                                        </p>
                                        <p class="text-gray mb-3"><i class="icofont-list"></i> ORDER #25102589748 <i class="icofont-clock-time ml-2"></i> Mon, Nov 12, 6:26 PM</p>
                                        <p class="text-dark">Veg Masala Roll x 1, Veg Burger x 1, Veg Penne Pasta in Red Sauce x 1
                                        </p>
                                        <hr>
                                        <div class="float-right">
                                            <a class="btn btn-sm btn-outline-primary" href="#"><i class="icofont-headphone-alt"></i> HELP</a>
                                            <a class="btn btn-sm btn-primary" href="#"><i class="icofont-refresh"></i> REORDER</a>
                                        </div>
                                        <p class="mb-0 text-black text-primary pt-2"><span class="text-black font-weight-bold"> Total Paid:</span> $300
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
