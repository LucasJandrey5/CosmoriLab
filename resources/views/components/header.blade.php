<?php
use Illuminate\Support\Facades\Auth;

function fullNameToFirstName($fullName, $checkFirstNameLength=TRUE)
{
	// Split out name so we can quickly grab the first name part
	$nameParts = explode(' ', $fullName);
	$firstName = $nameParts[0];

	// If the first part of the name is a prefix, then find the name differently
	if(in_array(strtolower($firstName), array('mr', 'ms', 'mrs', 'miss', 'dr', 'mr.', 'ms.', 'mrs.', 'miss.', 'dr.'))) {
		if($nameParts[2]!='') {
			// E.g. Mr James Smith -> James
			$firstName = $nameParts[1];
		} else {
			// e.g. Mr Smith (no first name given)
			$firstName = $fullName;
		}
	}

	// make sure the first name is not just "J", e.g. "J Smith" or "Mr J Smith" or even "Mr J. Smith"
	if($checkFirstNameLength && strlen($firstName)<4) {
		$firstName = $fullName;
	}
	return $firstName;
}

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
<link rel="stylesheet" href="{{ URL::asset('css/header.css') }}">
<script type="text/javascript" src="{{ URL::asset('js/header.js') }}"></script>
<div class="super_container">
    <!-- Header -->
    <header class="header">
        <!-- Top Bar -->
        <div class="top_bar">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-row">
                        <div class="top_bar_contact_item">
                            <div class="top_bar_icon"><i class="far fa-user-circle"></i>
                            </div>
                            <?php if(Auth::check()){
                                    echo ' Seja bem-vindo(a) ';
                                    echo auth()->user()->name_string;
                                    echo '!';
                                } else {
                                    echo 'Seja bem-vindo(a)';
                                }
                            ?>
                        </div>
                        <div class="top_bar_content ml-auto">
                            <div class="top_bar_menu">
                                <ul class="standard_dropdown top_bar_dropdown">
                                    <li> <a href="#">Portuguese<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="#">English</a></li>
                                            <li><a href="#">Spanish</a></li>
                                            <li><a href="#">Japanese</a></li>
                                        </ul>
                                    </li>
                                    <li> <a href="#">$ BRL Real<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="#">EUR Euro</a></li>
                                            <li><a href="#">US dollar</a></li>
                                            <li><a href="#">JPY Japanese Yen</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="top_bar_user">
                                <div class="user_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918647/user.svg" alt=""></div>
                                <?php
                                    if(Auth::check()){
                                        echo '<div><a href="#">'.fullNameToFirstName(Auth::user()->name_string).'</a></div>
                                              <div><a href="/log-out">Deslogar-se</a></div>
                                        ';
                                    } else {
                                        echo '
                                        <div><a href="/register">Registrar-se</a></div>
                                        <div><a href="/login">Login</a></div>
                                        ';
                                    }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Header Main -->
        <div class="header_main">
            <div class="container">
                <div class="row">
                    <!-- Logo -->
                    <div class="col-lg-2 col-sm-3 col-3 order-1">
                        <div class="logo_container">
                            <div class="logo"><a href="#"><img style="max-width: 100% !important;" src="https://cdn.discordapp.com/attachments/653267930817101854/945373911460233236/logo.png"></a></div>
                        </div>
                    </div> <!-- Search -->
                    <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                        <div class="header_search">
                            <div class="header_search_content">
                                <div class="header_search_form_container">
                                    <form action="#" class="header_search_form clearfix">
                                        <input type="search" required="required" class="header_search_input" placeholder="Procure por m??sicas, ??lbuns, compositores...">
                                        <div class="custom_dropdown">
                                            <div class="custom_dropdown_list"> <span class="custom_dropdown_placeholder clc">Todas categorias</span> <i class="fas fa-chevron-down"></i>
                                                <ul class="custom_list clc">
                                                    <li><a class="clc" href="#">Todas categorias</a></li>
                                                    <li><a class="clc" href="#">M??sicas</a></li>
                                                    <li><a class="clc" href="#">??lbuns</a></li>
                                                    <li><a class="clc" href="#">Compositores</a></li>
                                                </ul>
                                            </div>
                                        </div> <button type="submit" class="header_search_button trans_300" value="Submit"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918770/search.png" alt=""></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Wishlist -->
                    <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                        <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                            <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                <div class="wishlist_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918681/heart.png" alt=""></div>
                                <div class="wishlist_content">
                                    <div class="wishlist_text"><a href="#">Lista de Desejo</a></div>
                                    <div class="wishlist_count">10</div>
                                </div>
                            </div> <!-- Cart -->
                            <div class="cart">
                                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                    <div class="cart_icon"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918704/cart.png" alt="">
                                        <div class="cart_count"><span>3</span></div>
                                    </div>
                                    <div class="cart_content">
                                        <div class="cart_text"><a href="#">Carrinho</a></div>
                                        <div class="cart_price">$185</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Main Navigation -->
        <nav class="main_nav">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="main_nav_content d-flex flex-row">
                            <!-- Categories Menu -->
                            <!-- Main Nav Menu -->
                            <div class="main_nav_menu">
                                <ul class="standard_dropdown main_nav_dropdown">
                                    <li><a href="#">Home<i class="fas fa-chevron-down"></i></a></li>
                                    <li class="hassubs"> <a href="#">Laptop<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li> <a href="#">Lenovo<i class="fas fa-chevron-down"></i></a>
                                                <ul>
                                                    <li><a href="#">Lenovo 1<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">Lenovo 3<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">Lenovo 2<i class="fas fa-chevron-down"></i></a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">DELL<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="#">APPLE<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="#">HP<i class="fas fa-chevron-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="hassubs"> <a href="#">Featured Brands<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li> <a href="#">APPLE<i class="fas fa-chevron-down"></i></a>
                                                <ul>
                                                    <li><a href="#">Laptop<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">Mobiles<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">Ipads<i class="fas fa-chevron-down"></i></a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Samsung<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="#">Lenovo<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="#">DELL<i class="fas fa-chevron-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="hassubs"> <a href="#">Pages<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="shop.html">Shop<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="product.html">Product<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="blog.html">Blog<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="blog_single.html">Blog Post<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="regular.html">Regular Post<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="cart.html">Cart<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="contact.html">Contact<i class="fas fa-chevron-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="blog.html">Blog<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="contact.html">Contact<i class="fas fa-chevron-down"></i></a></li>
                                </ul>
                            </div> <!-- Menu Trigger -->
                            <div class="menu_trigger_container ml-auto">
                                <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                    <div class="menu_burger">
                                        <div class="menu_trigger_text">menu</div>
                                        <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav> <!-- Menu -->
        <div class="page_menu">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="page_menu_content">
                            <div class="page_menu_search">
                                <form action="#"> <input type="search" required="required" class="page_menu_search_input" placeholder="Search for products..."> </form>
                            </div>
                            <ul class="page_menu_nav">
                                <li class="page_menu_item has-children"> <a href="#">Language<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Japanese<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item has-children"> <a href="#">Currency<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item"> <a href="#">Home<i class="fa fa-angle-down"></i></a> </li>
                                <li class="page_menu_item has-children"> <a href="#">Super Deals<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">Super Deals<i class="fa fa-angle-down"></i></a></li>
                                        <li class="page_menu_item has-children"> <a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                            <ul class="page_menu_selection">
                                                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item has-children"> <a href="#">Featured Brands<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">Featured Brands<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item has-children"> <a href="#">Trending Styles<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">Trending Styles<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item"><a href="blog.html">blog<i class="fa fa-angle-down"></i></a></li>
                                <li class="page_menu_item"><a href="contact.html">contact<i class="fa fa-angle-down"></i></a></li>
                            </ul>
                            <div class="menu_contact">
                                <div class="menu_contact_item">
                                    <div class="menu_contact_icon"><img src="images/phone_white.png" alt=""></div>+38 068 005 3570
                                </div>
                                <div class="menu_contact_item">
                                    <div class="menu_contact_icon"><img src="images/mail_white.png" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
