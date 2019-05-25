@extends('adminlte::page')

@section('title', 'Galeria')

@section('content_header')

    <ol class="breadcrumb">
        <li><a href=" ">Dashboard</a></li>
        <li><a href=" ">Galeria</a></li>

        <li><a href="">Nova Imagem</a></li>

    </ol>
@stop

@section('content')

    <div class="col-md-6">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3>Cadastro</h3>
            </div>
            <form method="post" action="@if(!isset($action)){{  url('admin/gallery')}}@else {{$action}}@endif"
                  enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="box-body">

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="title">Titulo</label>
                            <input id="title" class="form-control" name="title"></input>
                        </div>
                    </div>
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
