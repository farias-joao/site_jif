<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>


    <link rel="icon" href={{asset('vendor/sensive/img/Fevicon.png')}} type="image/png">
    <link rel="stylesheet" href={{asset('vendor/sensive/vendors/bootstrap/bootstrap.min.css')}}>
    <link rel="stylesheet" href={{asset('vendor/sensive/vendors/fontawesome/css/all.min.css')}}>
    <link rel="stylesheet" href={{asset('vendor/sensive/vendors/themify-icons/themify-icons.css')}}>
    <link rel="stylesheet" href={{asset('vendor/sensive/vendors/linericon/style.css')}}>
    <link rel="stylesheet" href={{asset('vendor/sensive/vendors/owl-carousel/owl.theme.default.min.css')}}>
    <link rel="stylesheet" href={{asset('vendor/sensive/vendors/owl-carousel/owl.carousel.min.css')}}>
    <link rel="stylesheet" href={{asset('vendor/sensive/css/style.css')}}>
    @yield('css')

</head>
<body>

<!--================Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href={{route('home')}}><img src={{asset('vendor/sensive/img/logo.png')}} alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav justify-content-center">
                        <li class="nav-item active"><a class="nav-link" href={{url("/")}}>Página Inicial</a></li>
                        <li class="nav-item submenu dropdown">
                            <a href="{{ action('Site\ModalityController@index') }}" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true"
                               aria-expanded="false">Modalidades</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ action('Site\ModalityController@show','volley') }}">Volley</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ action('Site\ModalityController@show','handball') }}">Handball</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ action('Site\ModalityController@show','futsal') }}">Futsal</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ action('Site\ModalityController@show','basquete') }}">Basquete</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ action('Site\ModalityController@show','xadrez') }}">Xadrez</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ action('Site\ModalityController@show','tenis-de-mesa') }}">Tênis de mesa</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ action('Site\ModalityController@show','futebol') }}">Futebol</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href={{route("headquarter")}}>Sede</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url("locals")}}">Locais</a></li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true"
                               aria-expanded="false">Jogos</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{url("games")}}">Ao vivo</a></li>
                                <li class="nav-item"><a class="nav-link" href="blog-details.html">Tabela</a></li>
                                <li class="nav-item"><a class="nav-link" href="blog-details.html">Placar</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="index.html">Locais</a></li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                    </ul>
                    <ul class="nav navbar-nav navbar-right navbar-social">
                        <li><a href="#"><i class="ti-facebook"></i></a></li>
                        <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                        <li><a href="#"><i class="ti-instagram"></i></a></li>
                        <li><a href="#"><i class="ti-skype"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================Header Menu Area =================-->
<main class="site-main">
@yield('banner')

@yield('slider')

@yield('content')

<!--================ Start Footer Area =================-->
    <footer class="footer-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>About Us</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut
                            labore dolore
                            magna aliqua.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Newsletter</h6>
                        <p>Stay update with our latest</p>
                        <div class="" id="mc_embed_signup">

                            <form target="_blank" novalidate="true"
                                  action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                  method="get" class="form-inline">

                                <div class="d-flex flex-row">

                                    <input class="form-control" name="EMAIL" placeholder="Enter Email"
                                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
                                           required="" type="email">


                                    <button class="click-btn btn btn-default"><span class="lnr lnr-arrow-right"></span>
                                    </button>
                                    <div style="position: absolute; left: -5000px;">
                                        <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value=""
                                               type="text">
                                    </div>

                                    <!-- <div class="col-lg-4 col-md-4">
                                          <button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
                                        </div>  -->
                                </div>
                                <div class="info"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget mail-chimp">
                        <h6 class="mb-20">Instragram Feed</h6>
                        <ul class="instafeed d-flex flex-wrap">
                            <li><img src={{asset('vendor/sensive/img/instagram/i1.jpg')}} alt=""></li>
                            <li><img src={{asset('vendor/sensive/img/instagram/i2.jpg')}} alt=""></li>
                            <li><img src={{asset('vendor/sensive/img/instagram/i3.jpg')}} alt=""></li>
                            <li><img src={{asset('vendor/sensive/img/instagram/i4.jpg')}} alt=""></li>
                            <li><img src={{asset('vendor/sensive/img/instagram/i5.jpg')}} alt=""></li>
                            <li><img src={{asset('vendor/sensive/img/instagram/i6.jpg')}} alt=""></li>
                            <li><img src={{asset('vendor/sensive/img/instagram/i7.jpg')}} alt=""></li>
                            <li><img src={{asset('vendor/sensive/img/instagram/i8.jpg')}} alt=""></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Follow Us</h6>
                        <p>Let us be social</p>
                        <div class="footer-social d-flex align-items-center">
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-dribbble"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-behance"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
                <p class="footer-text m-0">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                    All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by
                    <a
                            href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </footer>
    <!--================ End Footer Area =================-->

</main>

<script src={{asset('vendor/sensive/vendors/jquery/jquery-3.2.1.min.js')}}></script>
<script src={{asset('vendor/sensive/vendors/bootstrap/bootstrap.bundle.min.js')}}></script>
<script src={{asset('vendor/sensive/vendors/owl-carousel/owl.carousel.min.js')}}></script>
<script src={{asset('vendor/sensive/js/jquery.ajaxchimp.min.js')}}></script>
<script src={{asset('vendor/sensive/js/mail-script.js')}}></script>
<script src={{asset('vendor/sensive/js/main.js')}}></script>

@yield('js')
</body>
</html>