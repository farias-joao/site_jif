@extends('adminlte::page')

@section('title', 'Jogos')

@section('css')
    <link rel="stylesheet" src="{{asset('css/style.css')}}">
@endsection

@section('content_header')
    <h1>Jogos</h1>

    <ol class="breadcrumb">
        <li><a href=" ">Dashboard</a></li>
        <li><a href=" ">Jogos</a></li>
    </ol>
@stop
@section('content')

    @include('admin.game.components.modal-form-game')
    @include('admin.game.components.modal-edit-form-game')
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
               data-toggle="modal" data-target="#teste"
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
                                <a class="btn btn-primary edit"
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

    <script>
        jQuery("#data").mask("99/99/9999");
    </script>

    <script>
        jQuery("#schedule").mask("99:99");
    </script>

    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });
    </script>

    <script>
        $(function () {
            $('#modality_id').change(function () {
                if ($(this).val()) {
                    $('#selectTeams').hide();
                    $.getJSON("/team_modality", {modality_id: $(this).val(), ajax: 'true'}, function (j) {

                        var options;
                        console.log(j)
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i].id + '">' + j[i].team_name + '</option>';
                        }
                        $('#selectTeams').html(options).show();
                    });
                } else {
                    $('#selectTeams').html(' <option value=""> – Escolha Time – </option>');

                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {

            var table = $('#datatable').DataTable();

            table.on('click', '.edit', function () {

                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                $('#edit_data').val(data[2])
                $('#edit_schedule').val(data[4])
                $('#edit').attr('action','/admin/games/'+data[0]);
                $('#editGame').modal('show');
            });

        });
    </script>
@endpush
