@extends('adminlte::page')

@include('admin.comment.components.modal-view-comment')

@section('title', 'Comentários')

@section('content_header')
    <h1>Comentários</h1>

    <ol class="breadcrumb">
        <li><a href=" ">Dashboard</a></li>
        <li><a href=" ">Comentários</a></li>
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
            <br>
        </div>
        <div class="box-body">
            <table class="table table-striped table-bordered table-hover" id="datatable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Autor</th>
                    <th>Conteudo</th>
                    <th>Jogo</th>
                    <th>Noticia</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>{{ $comment->author_comment_name }}</td>
                        <td>{{ substr($comment->content,0,60)}}</td>
                        @foreach($comment->game->teams as $team)
                            <td>{{$team->name_team}} X
                            @endforeach
                        </td>
                        <td>{{ $comment->notice['title'] }}</td>
                        @if($comment->solicitation->status == 0)
                            <td>Aberto</td>
                        @elseif($comment->solicitation->status == 1)
                            <td>Aprovado</td>
                        @else
                            <td>Recusado</td>
                        @endif
                        <td>
                            <form method="post"
                                  action="{{ action('Admin\CommentController@destroy', $comment->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <a class="btn btn-primary view"
                                   title="Visualizar Comentario">Detalhes</a>
                                <button type="submit" class="btn btn-danger delete-button"
                                        onclick="return confirm('Tem certeza?');" )>Apagar
                                </button>
                                <form method="post" action="">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-success ">Aprovar</button>
                                </form>
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

    <script>
        $("#optNotice").click(function () {
            $("#notice").show();
            $("#game").hide();
            $("#game")[0].selectedIndex = 0;
        });
    </script>

    <script>
        $("#optGame").click(function () {
            $("#game").show();
            $("#notice").hide();
            $("#notice")[0].selectedIndex = 0;
        });
    </script>
    <script>
        $(document).ready(function () {

            var table = $('#datatable').DataTable();

            table.on('click', '.view', function () {

                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                $('#author').val(data[1])
                $('#content').val(data[2])
                /*$('#edit').attr('action','/admin/games/'+data[0]);*/
                $('#modalComment').modal('show');
            });

        });
    </script>
@endpush
