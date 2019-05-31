@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Modalidade</h1>

    <ol class="breadcrumb">
        <li><a href=" ">Dashboard</a></li>
        <li><a href=" ">Modalidade</a></li>
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
            {{--<a class="btn btn-primary" href="{{route('users.create')}}">Novo</a>--}}
            <a class="btn btn-primary"
               href="{{ action('Admin\ModalityController@create') }}"
               title="Criar Comentario">Novo</a>

        </div>
        <div class="box-body">
        <table class="table table-striped table-bordered table-hover" id="datatable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Quantidade Jogadores</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($modalities as $modality)
                    <tr>
                        <td>{{ $modality->id }}</td>
                        <td>{{ $modality->name_modality }}</td>
                        <td>{{ $modality->total_players }}</td>
                        <td>
                            <form method="post" action="{{ action('Admin\ModalityController@destroy', $modality->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <a class="btn btn-primary"
                                   href="{{ action('Admin\ModalityController@edit', $modality->id) }}"
                                   title="Editar Modalidade">Editar</a>
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

