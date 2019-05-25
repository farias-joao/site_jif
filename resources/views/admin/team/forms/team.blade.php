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

        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3>Cadastro</h3>
                </div>
                <form method="post" action="@if(!isset($action)){{  url('admin\teams')}}@else {{$action}}@endif">
                    {{csrf_field()}}
                    @isset($team) {{method_field('patch')}} @endisset
                    <div class="box-body">
                    <input name="team_id" type="hidden" value="@isset($team) {{encrypt($team->id)}} @endisset">
                    <div class="form-group">
                        <label for="team_name">Nome Time</label>
                        <input type="text" class="form-control" id="team_name" name="team_name" placeholder="Nome Time"
                               value=" @if(!isset($team->team_name)){{''}}@else{{$team->team_name}}@endif">
                    </div>
                    <div class="form-group ">
                        <label for="user_id">Técnico</label>
                        <select id="user_id" class="form-control" name="user_id">
                            @if(isset($users))
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group ">
                        <label for="modality_id">Tipo Modalidade</label>
                        <select id="modality_id" class="form-control" name="modality_id">
                            <option
                                selected>@if(!isset($team->modality_id)){{ ''}}@else {{$team->modality_id}}@endif</option>
                            @foreach($modalities as $modality)
                                <option value="{{$modality->id}}">{{$modality->name_modality}}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">
                            Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
@endsection
