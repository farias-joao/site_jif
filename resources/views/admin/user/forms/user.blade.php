@extends('adminlte::page')

@section('title', 'Novo Usuário')

@section('content_header')
    <h1>Novo Usuário</h1>

    <ol class="breadcrumb">
        <li><a href=" ">Dashboard</a></li>
        <li><a href=" ">Usuários</a></li>
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
                      action="@if(!isset($action)){{url('admin/users')}}@else {{$action}}@endif">
                    {{csrf_field()}}
                    @isset($user) {{method_field('patch')}} @endisset
                    <div class="box-body">
                        <input name="user_id" type="hidden" value="@isset($user) {{encrypt($user->id)}} @endisset">

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Nome</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nome"
                                       value="@if(!isset($user->name)){{''}}@else{{$user->name}}@endif">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cpf" class="col-sm-2 control-label">CPF</label>

                            <div class="col-sm-10">
                                <input type="cpf" class="form-control" id="cpf" placeholder="CPF" name="cpf"
                                       value="@if(!isset($user->cpf)){{''}}@else{{$user->cpf}}@endif">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                                       value="@if(!isset($user->email)){{''}}@else{{$user->email}}@endif">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Senha</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="password" placeholder="Senha"
                                       name="password"
                                       value="@if(!isset($user->password)){{''}}@else{{$user->password}}@endif">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2 control-label">Tipo Usuario</label>
                            <div class="col-sm-10">
                                <select class="form-control col-sm-10" id="selectTypeUser" name="selectTypeUser">
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
