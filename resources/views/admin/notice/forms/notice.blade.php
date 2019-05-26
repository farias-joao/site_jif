@extends('adminlte::page')

@section('title', 'Noticias')

@section('content_header')

    <ol class="breadcrumb">
        <li><a href=" ">Dashboard</a></li>
        <li><a href=" ">Noticias</a></li>
        @if(isset($notice))
            <li><a href="">Editar Noticia</a></li>
        @else
            <li><a href="">Nova Noticia</a></li>
        @endif
    </ol>
@stop

@section('content')

    <div class="col-md-6">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3>Cadastro</h3>
            </div>
            <form method="post" action="@if(!isset($action)){{  url('admin/notices')}}@else {{$action}}@endif" enctype="multipart/form-data">
                {{csrf_field()}}
                @isset($notice) {{method_field('patch')}} @endisset
                <div class="box-body">
                    <input name="notice_id" type="hidden" value="@isset($notice) {{encrypt($notice->id)}} @endisset">

                    <div class="form-group ">
                        <label class="col-sm-2 control-label">Usuario</label>
                            <select class="form-control col-md-6" id="selectUser" name="selectUser">
                                @if(isset($users))
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">
                                            {{$user->name}}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="title">Titulo</label>
                            <input id="title" class="form-control" name="title"
                                   value="@if(!isset($notice->title)){{ ''}}@else {{$notice->title}}@endif"></input>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="content">Conteudo</label>
                            <textarea id="content" class="form-control"
                                      name="content">@if(!isset($notice->content)){{''}}@else{{$notice->content}}@endif</textarea>
                        </div>
                    </div>
                    @if(isset($notice) && $notice->image != null)
                        <img src="{{url("storage/images/notice/{$notice->image}")}}" alt="{{$notice->title}}" style="max-width: 200px">
                    @endif
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="content">Imagem</label>
                            <input type="file" id="imgUp" class="form-control" name="imgUp"></input>
                        </div>
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
@endsection
