@extends('adminlte::page')

@section('title', 'Comentário')

@section('content_header')

    <ol class="breadcrumb">
        <li><a href=" ">Dashboard</a></li>
        <li><a href=" ">Comentarios</a></li>
        @if(isset($comment))
            <li><a href="">Editar Comentario</a></li>
        @else
            <li><a href="">Novo Comentario</a></li>
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
                <form method="post" action="@if(!isset($action)){{  url('admin\players')}}@else {{$action}}@endif">
                    {{csrf_field()}}
                    @isset($player) {{method_field('patch')}} @endisset
                    <div class="box-body">
                        <input name="player_id" type="hidden"
                               value="@isset($player) {{encrypt($player->id)}} @endisset">

                        <div class="form-group">
                            <label for="name_player">Nome</label>
                            <input id="name_player" class="form-control" name="name_player" type="text"
                                   value="@if(!isset($player->name_player)){{''}}@else{{$player->name_player}}@endif">
                        </div>

                        <div class="form-group">
                            <label for="ra_player">Numero RA</label>
                            <input id="ra_player" class="form-control" name="ra_player"
                                   value="@if(!isset($player->ra_player)){{''}}@else{{$player->ra_player}}@endif"></input>
                        </div>

                        <div class="form-group ">
                            <label>Times</label>
                            <select class="form-control" id="selectTeam" name="selectTeam">
                                @if(isset($teams))
                                    @foreach($teams as $team)
                                        <option value="{{$team->id}}">
                                            {{$team->team_name}}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
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
