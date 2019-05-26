@extends('site.home.master')

@section('title','Jogos ao vivo')

@section('content')
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="d-none d-sm-block mb-5 pb-4">
                <div id="box">
                    <div class="box-body">
                        @if(isset($games))
                            @foreach($games as $game)
                                <div class="row">
                                    {{--   <div class="col">
                                           {{$game->modalities}}
                                       </div>--}}
                                    <div class="col">
                                        {{$game->schedule}}
                                    </div>
                                    <div class="col">
                                        @foreach($game->gameteams as $gameteam)
                                            @foreach($gameteam as $team)
                                                {{$team->team->name_team}}
                                            @endforeach
                                        @endforeach
                                    </div>
                                    <div class="col">

                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h3>Nenhum Jogo ocorrendo</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection