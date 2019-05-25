@extends('adminlte::page')

@section('title', 'Comentário')

@section('content_header')

    <ol class="breadcrumb">
        <li><a href=" ">Dashboard</a></li>
        <li><a href=" ">Placar</a></li>
        @if(isset($comment))
            <li><a href="">Editar Placar</a></li>
        @else
            <li><a href="">Novo Placar</a></li>
        @endif
    </ol>
@stop

@section('content')
    <div class="box-body">
        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3>Cadastro</h3>
                </div>
                <form method="post" action="@if(!isset($action)){{  url('admin\scoreboards')}}@else {{$action}}@endif">
                    {{csrf_field()}}
                    @isset($scoreboard) {{method_field('patch')}} @endisset
                    <div class="box-body">
                        <input name="scoreboard_id" type="hidden"
                               value="@isset($scoreboard) {{encrypt($scoreboard->id)}} @endisset">

                        <div class="form-group ">
                            <label class="control-label">Jogo</label>
                            <select class="form-control col-sm-10" id="selectGame" name="selectGame">
                                    @foreach($game_teams as $game)
                                        <option value="{{$game->id}}">
                                            {{$game->id}} ------- {{$game->game->local->alias}} ------
                                                {{$game->team->team_name}}
                                        </option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="form-group ">
                            <label class="control-label">Time</label>
                            <select class="form-control col-sm-10" id="selectTeam" name="selectTeam">
                                    @foreach($teams as $team)
                                        <option value="{{$team->id}}">
                                            {{$team->team_name}}
                                        </option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <div class="col-xs-3">
                                <label for="points">Pontos</label>
                                <input id="points" name="points" type="text"
                                       value=" @if(!isset($scoreboard->points)){{ ''}}@else {{$scoreboard->points}}@endif">
                            </div>
                            <div class="col-xs-3">
                                <label class="control-label" for="round">Rodada</label>
                                <input id="round" name="round"
                                       value="@if(!isset($scoreboard->round)){{ ''}}@else {{$scoreboard->round}}@endif"></input>
                            </div>
                            <div class="form-group col-xs-3 ">
                                <label class="control-label">Status</label>
                                <select class="form-control col-xs-3" id="selectStatus" name="selectStatus">
                                    @if(isset($scoreboard))
                                        <option value="{{$scoreboard->status}}">
                                            @if($scoreboard->status == 1)
                                                {{Aberto}}
                                            @else
                                                {{Encerrado}}
                                        </option>
                                    @endif
                                    @else
                                        <option value=1>Aberto</option>
                                        <option value=0>Encerrado</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
