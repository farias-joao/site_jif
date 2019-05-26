@extends('adminlte::page')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    <h3>{{ $comment->id }}</h3>
                </div>
                <div class="card-body">
                    <p>
                       Autor: {{ $comment->author_comment_name }}
                    </p>
                    <p>
                        Conteudo: {{ $comment->content }}
                    </p>
                    <p>
                        ID Noticia: {{ $comment->notice_id }}
                    </p>
                    <p>
                       ID Jogo:  {{ $comment->game_id }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection