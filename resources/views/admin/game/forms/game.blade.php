@extends('adminlte::page')

@section('title', 'Novo Usuário')

@section('content_header')
    <h1>Jogos</h1>

    <ol class="breadcrumb">
        <li><a href=" ">Dashboard</a></li>
        <li><a href=" ">Jogos</a></li>
        @if(isset($game))
            <li><a href="">Editar Jogo</a></li>
        @else
            <li><a href="">Novo Jogo</a></li>
        @endif
    </ol>
@stop


@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <!-- Horizontal Form -->
                <div class="box-header with-border">
                    <h3 class="box-title">Cadastro</h3>
                </div>
                <form  method="post"
                      action="@if(!isset($action)){{  url('admin\games')}}@else {{$action}}@endif">
                    {{csrf_field()}}
                    @isset($game) {{method_field('patch')}} @endisset

                    <div class="box-body">
                        <input name="game_id" type="hidden" value="@isset($game) {{encrypt($game->id)}} @endisset">
                        <div class="form-group ">
                            <label>Local</label>
                            <select class="form-control" id="local_id" name="local_id">
                                @foreach($locals as $local)
                                    <option value="{{$local->id}}">
                                        {{$local->alias}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group ">
                            <label>Times</label>
                            <select class="form-control js-example-basic-multiple" multiple="multiple"
                                    id="selectTeams" name="selectTeams[]">
                                @if(isset($teams))
                                    @foreach($teams as $team)
                                        <option value="{{$team->id}}">
                                            {{$team->team_name}}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="data">Data</label>
                            <input id="data" class="form-control" name="data"
                                   value="@if(!isset($game->data)){{ ''}}@else {{$game->data}}@endif"
                                   placeholder="dd/mm/aaaa"></input>
                        </div>

                        <div class="form-group">
                            <label for="schedule">Horario</label>
                            <input id="schedule" class="form-control" name="schedule"
                                   value="@if(!isset($game->schedule)){{ ''}}@else {{$game->schedule}}@endif"
                                   placeholder="HH:mm"></input>
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

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

    <script>
        jQuery("#data").mask("99/99/9999");
    </script>

    <script>
        jQuery("#schedule").mask("99:99");
    </script>

    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endpush


