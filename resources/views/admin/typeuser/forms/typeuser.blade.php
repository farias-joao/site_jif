@extends('adminlte::page')

@section('title', 'Novo Tipo Usuário')

@section('content_header')
    <h1>Novo Tipo Usuário</h1>

    <ol class="breadcrumb">
        <li><a href=" ">Dashboard</a></li>
        <li><a href=" ">Tipo Usuários</a></li>
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
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" class="form-horizontal"
                      action="@if(!isset($action)){{url('admin/typeusers')}}@else {{$action}}@endif">
                    {{csrf_field()}}
                    @isset($typeuser) {{method_field('patch')}} @endisset
                    <div class="box-body">
                        <input name="typeuser_id" type="hidden" value="@isset($typeuser) {{encrypt($typeuser->id)}} @endisset">

                        <div class="form-group">
                            <label for="type" class="col-sm-2 control-label">Categoria</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="type" name="type" placeholder="Categoria"
                                       value="@if(!isset($typeuser->type)){{''}}@else{{$typeuser->type}}@endif">
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="col-sm-2 control-label">Permissao</label>
                            <div class="col-sm-10">
                                <select class="form-control col-sm-10" id="selectTypeUser" name="selectTypePermission">
                                    @if(isset($type_users))
                                        @foreach($type_users as $type_user)
                                            <option value="{{$type_user->id}}">
                                                {{$type_user->type}}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-default">Cancelar</button>
                        <button type="submit" class="btn btn-info pull-right">Cadastrar</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
@stop
