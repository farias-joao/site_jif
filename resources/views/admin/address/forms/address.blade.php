@extends('adminlte::page')

@section('title', 'Novo Endereco')

@section('content_header')
    <h1>Novo Endereco</h1>

    <ol class="breadcrumb">
        <li><a href=" ">Dashboard</a></li>
        <li><a href=" ">Endereco</a></li>
        <li><a href=" ">Cadastrar</a></li>
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
                <div class="card-body">
                    <form method="post" action="@if(!isset($action)){{  url('admin\address')}}@else {{$action}}@endif">
                        {{csrf_field()}}
                        @isset($address) {{method_field('patch')}} @endisset
                        <input name="address_id" type="hidden" value= "@isset($address) {{encrypt($address->id)}} @endisset">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="street">Rua</label>
                                <input id="street" class="form-control" name="street" type="text" value=" @if(!isset($address->street)){{ ''}}@else {{$address->street}}@endif">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="number">Numero</label>
                                <input id="number" class="form-control" name="number" value="@if(!isset($address->number)){{ ''}}@else {{$address->number}}@endif"></input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="neighborhood">Bairro</label>
                                <input id="neighborhood" class="form-control" name="neighborhood" value="@if(!isset($address->neighborhood)){{ ''}}@else {{$address->neighborhood}}@endif"></input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="local_id" >Local</label>
                                <input id="local_id" class="form-control" name="local_id" value="@if(!isset($address->local_id)){{ ''}}@else {{$address->local_id}}@endif"></input>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
