@extends('adminlte::page')

@section('title', 'Tipos Usuários')

@section('content_header')
    <h1>Tipos Usuários</h1>

    <ol class="breadcrumb">
        <li><a href="'">Dashboard</a></li>
        <li><a href="'">Tipos Usuários</a></li>
    </ol>
@stop

@section('content')
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
            {{--<a class="btn btn-primary" href="{{route('users.create')}}">Novo</a>--}}
            <a class="btn btn-primary"
               href="{{ action('Admin\TypeUserController@create') }}"
               title="Editar tipo usuario">Novo</a>

        </div>
        <div class="box-body">
            <table class="table table-striped table-bordered table-hover" id="datatable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Categoria</th>
                    <th>Permissao</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($typeusers as $typeuser)
                    <tr>
                        <td>{{ $typeuser->id }}</td>
                        <td>{{ $typeuser->type }}</td>
                        <td>{{ $typeuser->permission }}</td>
                        <td>
                            <form method="post"
                                  action="{{ action('Admin\TypeUserController@destroy', $typeuser->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <a class="btn btn-primary"
                                   href="{{ action('Admin\TypeUserController@edit', $typeuser->id) }}"
                                   title="Editar tipo usuario">Editar</a>
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
@endpush

