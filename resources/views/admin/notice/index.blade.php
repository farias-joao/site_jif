@extends('adminlte::page')

@section('title', 'Noticias')

@section('content_header')
    <h1>Noticias</h1>

    <ol class="breadcrumb">
        <li><a href=" ">Dashboard</a></li>
        <li><a href=" ">Noticias</a></li>
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
                   href="{{ action('Admin\NoticeController@create') }}"
                   title="Criar Comentario">Novo</a>

            </div>
            <div class="box-body">
                <table class="table table-striped table-bordered table-hover" id="datatable">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Autor</th>
                        <th>Titulo</th>
                        <th>Conteudo</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($notices as $notice)
                        <tr>
                            <td>{{ $notice->id }}</td>
                            <td>{{ $notice->user->name }}</td>
                            <td>{{ $notice->title }}</td>
                            <td>{{ substr($notice->content,0,60)}}...</td>
                            <td>
                                <form method="post"
                                      action="{{ action('Admin\NoticeController@destroy', $notice->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <a class="btn btn-primary"
                                       href="{{ action('Admin\NoticeController@edit', $notice->id) }}"
                                       title="Editar Noticia">Editar</a>
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
