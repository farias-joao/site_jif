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
        <div class="box box-info ">
            <div class="box-header with-border">
                <h3>Cadastro</h3>
            </div>
            <form class="form-horizontal" method="post"
                  action="@if(!isset($action)){{  url('admin\locals')}}@else {{$action}}@endif">
                {{csrf_field()}}
                @isset($local) {{method_field('patch')}} @endisset
                <div class="box-body">
                    <input name="local_id" type="hidden" value="@isset($local) {{encrypt($local->id)}} @endisset">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="alias">Nome</label>
                            <input id="alias" class="form-control" name="alias" type="text"
                                   value=" @if(!isset($local->alias)){{ ''}}@else {{$local->alias}}@endif">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-10">
                            <label for="street">Rua</label>
                            <input id="street" class="form-control" name="street" type="text"
                                   value=" @if(!isset($local->address->street)){{ ''}}@else {{$local->address->street}}@endif">
                        </div>

                        <div class="col-md-2">
                            <label for="number">Numero</label>
                            <input id="number" class="form-control" name="number"
                                   value="@if(!isset($local->address->number)){{ ''}}@else {{$local->address->number}}@endif"></input>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="neighborhood">Bairro</label>
                            <input id="neighborhood" class="form-control" name="neighborhood"
                                   value="@if(!isset($local->address->neighborhood)){{ ''}}@else {{$local->address->neighborhood}}@endif"></input>
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
