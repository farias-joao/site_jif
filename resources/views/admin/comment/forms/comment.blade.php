@extends('adminlte::page')

@section('title', 'Comentário')

@section('content_header')

    <ol class="breadcrumb">
        <li><a href=" ">Dashboard</a></li>
        <li><a href=" ">Comentarios</a></li>
        @if(isset($comment))
            <li><a href="">Editar Comentario</a></li>
        @else
            <li><a href="">Novo Comentario</a></li>
        @endif
    </ol>
@stop

@section('content')

    <div class="box-body">
        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3>Cadastro</h3>
                </div>
                <form method="post" action="@if(!isset($action)){{  url('admin\comments')}}@else {{$action}}@endif">
                    {{csrf_field()}}
                    @isset($comment) {{method_field('patch')}} @endisset
                    <input name="comment_id" type="hidden" value="@isset($comment) {{encrypt($comment->id)}} @endisset">
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="author">Nome Autor</label>
                                <input id="author" class="form-control" name="author" type="text"
                                       value=" @if(!isset($comment->author_comment_name)){{ ''}}@else {{$comment->author_comment_name}}@endif">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="content">Conteudo</label>
                                <input id="content" class="form-control" name="content"
                                       value="@if(!isset($comment->content)){{ ''}}@else {{$comment->content}}@endif"></input>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="radio-inline">
                                <label>
                                    <input name="optionsRadios" id="optNotice" type="radio" checked=""
                                           value="option1">
                                    Noticia
                                </label>
                            </div>
                            <div class="radio-inline">
                                <label>
                                    <input name="optionsRadios" id="optGame" type="radio" value="option2">
                                    Jogo
                                </label>
                            </div>
                        </div>
                        <div class="form-group " id="game" style="display: none;">
                            <label class="control-label">Jogos</label>
                            <select class="form-control col-sm-10" id="selectGame" name="selectGame">
                                <option value="0">Selecione um Jogo</option>
                                @foreach($game_teams as $game)
                                    <option value="{{$game->id}}">
                                        {{$game->id}} ------- {{$game->game->local->alias}} ------
                                        {{$game->team->team_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group" id="notice">
                            <label class="control-label">Noticias</label>
                            <select class="form-control col-sm-10" id="selectNotice" name="selectNotice">
                                <option value="0">Selecione uma noticia</option>
                                @foreach($notices as $notice)
                                    <option value="{{$notice->id}}">
                                        {{$notice->id}} ------- {{$notice->title}} ------
                                        {{substr($notice->content,0,10)}}...
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
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
@endpush
