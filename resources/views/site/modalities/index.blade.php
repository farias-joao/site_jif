@extends('site.home.master')

@section('title','Modalidades')

@section('content')

    <div class="container">
        <div class="box">
            <div class="box-body">
                <div class=" sidebar-widgets">
                    <div class="widget-wrap">
                        <div class="single-sidebar-widget newsletter-widget">
                            <h4 class="single-sidebar-widget__title">Modalidades</h4>
                            <p>Este ano o JIF contará com o total de 7 Modalidades </p>

                            <ul>
                                <li><a href="{{ action('Site\ModalityController@show','volley') }}">Volley</a></li>
                                <li><a href="{{ action('Site\ModalityController@show','handball') }}">Handball</a></li>
                                <li><a href="{{ action('Site\ModalityController@show','futsal') }}">Futsal</a></li>
                                <li><a href="{{ action('Site\ModalityController@show','basquete') }}">Basquete</a></li>
                                <li><a href="{{ action('Site\ModalityController@show','xadrez') }}">Xadrez</a></li>
                                <li><a href="{{ action('Site\ModalityController@show','tenis-de-mesa') }}">Tênis de mesa</a></li>
                                <li><a href="{{ action('Site\ModalityController@show','futebol') }}">Futebol</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Blog Post Siddebar -->
        </div>
    </div>
@endsection