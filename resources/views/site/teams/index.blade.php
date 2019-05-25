@extends('site.home.master')

@section('title','Times')

@section('content')
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="d-none d-sm-block mb-5 pb-4">
                <div id="box">
                    <div class="box-body">
                        @if(count($modalities) > 0)
                            @foreach($modalities as $modality)
                                <h3>{{$modality->name_modality}}</h3>
                                @foreach($teams as $team)
                                    @if(($modality->name_modality) === ($team->modality->name_modality))
                                        <div class="box-body">
                                            <table class="table table-striped table-bordered table-hover"
                                                   id="datatable">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Técnico</th>
                                                    <th>Nome</th>
                                                    <th>Jogador</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($team->playerteams as $playerteam)
                                                    <tr>
                                                        <td>{{ $team->id }}</td>
                                                        <td>{{ $team->user->name }}</td>
                                                        <td>{{ $team->team_name }}</td>
                                                        <td>{{$playerteam->player->name_player}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                        @else
                            <h3>Nenhum Time Cadastrado</h3>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection