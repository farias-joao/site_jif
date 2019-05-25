@extends('adminlte::page')

@section('title', 'Enderecos')

@section('content_header')
    <h1>Enderecos</h1>

    <ol class="breadcrumb">
        <li><a href=" ">Dashboard</a></li>
        <li><a href=" ">Enderecos</a></li>
    </ol>
@stop


@section('content')
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="fechar">&times;</a></p>
            @endif
        @endforeach
    </div>

    <div class="box">
        <div class="box-header">
            <h2>Endereços</h2>
            <a class="btn btn-primary"
               href="{{ action('Admin\AddressController@create') }}"
               title="Novo Endereco">Novo</a>
        </div>
        <div class="box-body">
            <table class="table table-striped table-bordered table-hover" id="datatable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Rua</th>
                    <th>Numero</th>
                    <th>Bairro</th>
                    <th>Local</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($addresses as $addres)
                    <tr>
                        <td>{{ $addres->id }}</td>
                        <td>{{ $addres->street }}</td>
                        <td>{{ $addres->number }}</td>
                        <td>{{ $addres->neighborhood }}</td>
                        <td>{{ $addres->local->alias }}</td>
                        <td>
                            <form method="post" action="{{ action('Admin\AddressController@destroy', $addres->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <a class="btn btn-primary"
                                   href="{{ action('Admin\AddressController@edit', $addres->id) }}"
                                   title="Editar Endereco">Editar</a>
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
@endsection

@push('js')
    <script>
        $(document).ready( function () {
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
