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
                <div class="card-body">
                    <form method="post"
                          action="@if(!isset($action)){{  url('admin\punctuations')}}@else {{$action}}@endif">
                        {{csrf_field()}}
                        @isset($punctuation) {{method_field('patch')}} @endisset
                        <div class="box-body">
                            <input name="punctuation_id" type="hidden"
                                   value="@isset($punctuation) {{encrypt($punctuation->id)}} @endisset">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="total_points">Total Pontos</label>
                                    <input id="total_points" class="form-control" name="total_points" type="text"
                                           value=" @if(!isset($punctuation->total_points)){{ ''}}@else {{$punctuation->total_points}}@endif">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label >Time</label>
                                    <select class="form-control" id="selectTeam" name="selectTeam">
                                        @if(isset($teams))
                                            @foreach($teams as $team)
                                                <option value="{{$team->id}}">
                                                    {{$team->team_name}}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="total_wins">Total Vitórias</label>
                                    <input id="total_wins" class="form-control" name="total_wins"
                                           value="@if(!isset($punctuation->total_wins)){{ ''}}@else {{$punctuation->total_wins}}@endif"></input>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="total_loses">Total Derrotas</label>
                                    <input id="total_loses" class="form-control" name="total_loses"
                                           value="@if(!isset($punctuation->total_loses)){{ ''}}@else {{$punctuation->total_loses}}@endif"></input>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="total_draw">Total Empates</label>
                                    <input id="total_draw" class="form-control" name="total_draw"
                                           value="@if(!isset($punctuation->total_draw)){{ ''}}@else {{$punctuation->total_draw}}@endif"></input>
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
        </div>
@endsection
