@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Usuários</h1>

    <ol class="breadcrumb">
        <li><a href=" ">Dashboard</a></li>
        <li><a href=" ">Usuários</a></li>
    </ol>
@stop

@section('content')
    @include('admin.user.components.modal-insert-user')

    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close"
                                                                                         data-dismiss="alert"
                                                                                         aria-label="fechar">&times;</a>
                </p>
            @endif
        @endforeach
    </div>
    <div class="box">
        <div class="box-header">
            <a class="btn btn-primary"
               data-toggle="modal" data-target="#modalUser"
               id="openForm"
               title="Novo usuario">Novo</a>

        </div>
        <div class="box-body">
            <table class="table table-striped table-bordered table-hover" id="datatable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Função</th>
                    <th>Email</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        @foreach($user->roles as $role)
                            @if(count($user->roles) == 1)
                                <td>{{$role->name}}</td>
                            @else
                                <td>{{$role->name}},
                                    @endif
                                </td>
                                @endforeach
                                <td>{{ $user->email }}</td>
                                <td>
                                    <form method="post"
                                          action="{{ action('Admin\UserController@destroy', $user->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <a class="btn btn-primary edit"
                                           title="Editar usuario">Editar</a>
                                        <button type="submit" class="btn btn-danger delete-button"
                                                onclick="return confirm('Tem certeza?');" )>Apagar
                                        </button>
                                    </form>
                                </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@push('js')
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable({
                "language": {
                    "lengthMenu": "Mostrando _MENU_ registros por página",
                    "zeroRecords": "Nada encontrado",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "Nenhum registro disponível",
                    "infoFiltered": "(filtrado de _MAX_ registros no total)"
                }
            });
        })
    </script>

    <script>
        jQuery(document).ready(function(){
            jQuery('#insertSubmit').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{ url('admin/users') }}",
                    method: 'post',
                    data: {
                        name: jQuery('#name').val(),
                        local: jQuery('#selectLocal').val(),
                        siape: jQuery('#siape').val(),
                        email: jQuery('#email').val(),
                        password: jQuery('#password').val(),
                        selectRole: jQuery('#selectRole').val(),
                        imgUp: jQuery('#imgUp').val(),
                    },

                    success: function(result){
                        if(result.errors)
                        {
                            jQuery('.alert-danger').html('');

                            jQuery.each(result.errors, function(key, value){
                                jQuery('.alert-danger').show();
                                jQuery('.alert-danger').append('<li>'+value+'</li>');
                            });
                        }
                        else
                        {
                            jQuery('.alert-danger').hide();
                            $('#openForm').hide();
                            $('#modalUser').modal('hide');
                        }
                    },
                });
            });
        });
    </script>
@endpush
