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
            <h2>Comentarios</h2>
            <div class="box">
                <div class="box-header">
                    {{--<a class="btn btn-primary" href="{{route('users.create')}}">Novo</a>--}}
                    <a class="btn btn-primary"
                       href="{{ action('Admin\CommentController@create') }}"
                       title="Criar Comentario">Novo</a>

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
                                <td>{{ substr($comment->content,0,60) }}</td>
                                <td>{{ $comment->game_id }}</td>
                                <td>{{ $comment->notice_id }}</td>
                                @if($comment->solicitation->status == 0)
                                    <td>Aberta</td>
                                @elseif($comment->solicitation->status == 1)
                                    <td>Aberta</td>
                                @else
                                    <td>Recusada</td>
                                @endif
                                <td>
                                    <form method="post"
                                          action="{{ action('Admin\CommentController@destroy', $comment->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <a class="btn btn-primary"
                                           href="{{ action('Admin\CommentController@edit', $comment->id) }}"
                                           title="Editar Comentario">Editar</a>
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
