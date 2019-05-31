@extends('adminlte::page')

@section('title', 'Modalidade')

@section('content_header')

    <ol class="breadcrumb">
        <li><a href=" ">Dashboard</a></li>
        <li><a href=" ">Modalidade</a></li>
        @if(isset($comment))
            <li><a href="">Editar Modalidade</a></li>
        @else
            <li><a href="">Nova Modalidade</a></li>
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
            <form method="post" action="@if(!isset($modality)){{  url('admin/modalities')}}@else {{$action}}@endif">
                {{csrf_field()}}
                @isset($modality) {{method_field('patch')}} @endisset
                <div class="box-body">
                    <input name="modality_id" type="hidden"
                           value="@isset($modality) {{encrypt($modality->id)}} @endisset">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="name_modality">Nome Modalidade</label>
                            <input id="name_modality" class="form-control" name="name_modality" type="text"
                                   value=" @if(!isset($modality->name_modality)){{ ''}}@else {{$modality->name_modality}}@endif">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="total_players">Numero Jogadores</label>
                            <input id="total_players" class="form-control" name="total_players"
                                   value="@if(!isset($modality->total_players)){{ ''}}@else {{$modality->total_players}}@endif"></input>
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
@endsection
