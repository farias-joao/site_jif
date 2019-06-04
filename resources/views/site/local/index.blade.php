@extends('site.home.master')

@section('title','Locais')

@section('content')

    <div class="container">
        <div class="box">
            <div class="box-body">
                <div class=" sidebar-widgets">
                    <div class="widget-wrap">
                        <div class="single-sidebar-widget newsletter-widget">
                            <h4 class="single-sidebar-widget__title">Modalidades</h4>
                            <h2>Locais</h2>
                            @if(isset($locals))
                                <ul>
                                    @foreach($locals as $local)
                                        <li><a href="{{ action('Site\LocalController@show',$local) }}">{{$local->alias}}</a></li>
                                    @endforeach
                                </ul>
                            @else
                                <p>Nenhum local cadastrado</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Blog Post Siddebar -->
        </div>
    </div>
@endsection