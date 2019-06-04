@extends('adminlte::page')

@include('admin.result.components.modal-insert-result')

@section('title', 'Resultados')

@section('content_header')
    <h1>Resultados</h1>

    <ol class="breadcrumb">
        <li><a href=" ">Dashboard</a></li>
        <li><a href=" ">Resultados</a></li>
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
               data-toggle="modal" data-target="#modalResult"
               title="Criar Resultado">Novo</a>

        </div>
        <div class="box-body">
            <table class="table table-striped table-bordered table-hover" id="datatable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Status</th>
                    <th>Jogo</th>
                    <th>Time</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($gamesTeam as $gameResults)
                    @foreach($gameResults->result as $result)
                        <tr>
                            <td>{{ $result->id }}</td>
                            @if($result->status_result == 0)
                                <td>Derrota</td>
                            @elseif( $result->status_result == 1)
                                <td>Vitoria</td>
                            @elseif( $result->status_result  == 2)
                                <td>Empate</td>
                            @else
                                <td>W.O.</td>
                            @endif
                            <td>{{$gameResults->game->id }}</td>
                            <td>{{$gameResults->team->team_name }}</td>
                            <td>
                                <form method="post"
                                      action="{{ action('Admin\ResultController@destroy', $result->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <a class="btn btn-primary edit"
                                       title="Editar Resultado">Editar</a>
                                    <button type="submit" class="btn btn-danger delete-button"
                                            onclick="return confirm('Tem certeza?');" )>Apagar
                                    </button>
                                </form>
                            </td>
                            @endforeach
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

