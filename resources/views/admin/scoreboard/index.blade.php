@extends('adminlte::page')

@include('admin.scoreboard.components.modal-insert-scoreboard')

@section('title', 'Placares')

@section('content_header')
    <h1>Placares</h1>

    <ol class="breadcrumb">
        <li><a href=" ">Dashboard</a></li>
        <li><a href=" ">Placares</a></li>
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
            <a class="btn btn-primary"
               data-toggle="modal" data-target="#modalScoreboard"
               title="Criar Placar">Novo</a>

        </div>
        <div class="box-body">
            <table class="table table-striped table-bordered table-hover" id="datatable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Pontos</th>
                    <th>Rodada</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($scoreboards as $scoreboard)
                    <tr>
                        <td>{{ $scoreboard->id }}</td>
                        <td>{{ $scoreboard->points }}</td>
                        <td>{{ $scoreboard->round->round_number }}</td>
                        <td>
                            <form method="post"
                                  action="{{ action('Admin\ScoreboardController@destroy', $scoreboard->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <a class="btn btn-primary edit"
                                   title="Editar placar">Editar</a>
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
