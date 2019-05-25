@extends('adminlte::page')

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
               href="{{ action('Admin\GameController@create') }}"
               title="Editar usuario">Novo</a>

        </div>
        <div class="box-body">
            <table class="table table-striped table-bordered table-hover" id="datatable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Local</th>
                    <th>Data</th>
                    <th>Equipe</th>
                    <th>Horario</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($game_teams as $game)
                        <tr>
                            <td>{{ $game->game->id }}</td>
                            <td>{{ $game->game->local->alias }}</td>
                            <td>{{ $game->game->data }}</td>
                            <td>{{ $game->team->team_name }}</td>
                            <td>{{ $game->game->schedule }}</td>
                            <td>
                                <form method="post" action="{{ action('Admin\GameController@destroy', $game->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <a class="btn btn-primary"
                                       href="{{ action('Admin\GameController@edit', $game->id) }}"
                                       title="Editar Jogo">Editar</a>
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
    </div
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
