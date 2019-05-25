@extends('adminlte::page')

@section('title', 'Resultado')

@section('content_header')

    <ol class="breadcrumb">
        <li><a href=" ">Dashboard</a></li>
        <li><a href=" ">Resultados</a></li>
        @if(isset($result))
            <li><a href="">Editar Resultado</a></li>
        @else
            <li><a href="">Novo Resultado</a></li>
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
                <form method="post" action="@if(!isset($action)){{  url('admin\results')}}@else {{$action}}@endif">
                    {{csrf_field()}}
                    @isset($result) {{method_field('patch')}} @endisset
                    <div class="box-body">
                        <input name="result_id" type="hidden"
                               value="@isset($result) {{encrypt($result->id)}} @endisset">

                        <div class="form-group ">
                            <label class="control-label">Jogo</label>
                            <select class="form-control col-sm-10" id="selectGame" name="selectGame">
                                @foreach($gamesTeam as $game)
                                    <option value="{{$game->id}}">
                                        {{$game->game->id}} ------- {{$game->game->local->alias}} ------
                                        {{$game->team->team_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-xs-3 ">
                            <label class="control-label">Status</label>
                            <select class="form-control col-xs-3" id="selectStatus" name="selectStatus">
                                <option value=0>Derrota</option>
                                <option value=1>Vitoria</option>
                                <option value=2>Empate</option>
                                <option value=3>W.O.</option>
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
    </div>
@endsection
