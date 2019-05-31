@extends('site.home.master')

@section('title','Jogos ao vivo')

@section('content')
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="d-none d-sm-block mb-5 pb-4">
                <div id="box">
                    <div class="box-body">
                        @if($count > 0)
                            @foreach($games as $game)
                                <h3>{{$game->modality->name_modality}}</h3>
                                <table class="table table-striped table-bordered table-hover" id="datatable">
                                    <thead>
                                    <tr>
                                        <th>Local</th>
                                        <th>Data</th>
                                        <th>Hora Inicio</th>
                                        <th>Rodada</th>
                                        @for($i = 0; $i <count($game->gameteams); $i++)
                                            <th>Equipe</th>
                                            <th>Pontuação</th>
                                        @endfor
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @if($game->status === 0)
                                            <td>{{ $game->local->alias }}</td>
                                            <td>{{ $game->data }}</td>
                                            <td>{{ $game->schedule }}</td>
                                            <td>{{count($game->rounds)}}</td>
                                            @foreach($game->gameteams as $gameteams)
                                                <td>{{$gameteams->team->team_name}}</td>
                                                @foreach($gameteams->scoreboards as $score)
                                                    @if($score->status === 1)
                                                        <td>{{$score->points}}</td>
                                                    @endif
                                                @endforeach
                                            @endforeach

                                            <td>
                                                <form method="post"
                                                      action="{{ action('Site\GameController@show', $game) }}">
                                                    {{ csrf_field() }}

                                                    <a class="btn btn-light"
                                                       href="{{ action('Site\GameController@show', $game) }}"
                                                       title="Detalhes">Acompanhar</a>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                    </tbody>
                                </table>
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