@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>@if(isset($count_user)){{$count_user}}@endif</h3>

                <p>Usuários Cadastrados</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3>@if(isset($count_typeuser)){{$count_typeuser}}@endif</h3>

                <p>Tipos Usuários Cadastrados</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-alarm-clock"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
            <div class="inner">
                <h3>@if(isset($count_modality)){{$count_modality}}@endif</h3>

                <p>Modalidades Cadastradas</p>
            </div>
            <div class="icon">
                <i class="ion ion-model-s"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>@if(isset($count_team)){{$count_team}}@endif</h3>

                <p>Times Cadastradas</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios-football"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
@stop


