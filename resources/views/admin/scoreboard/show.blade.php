@extends('adminlte::page')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    <h3>{{ $scoreboard->local->alias }}</h3>
                </div>
                <div class="card-body">
                    <p>
                       Pontos: {{ $scoreboard->points }}
                    </p>
                    <p>
                        Rodada: {{ $scoreboard->round }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection