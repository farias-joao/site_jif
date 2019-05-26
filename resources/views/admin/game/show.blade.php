@extends('adminlte::page')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    <h3>{{ $game->id }}</h3>
                </div>
                <div class="card-body">
                    <p>
                       Local: {{ $game->local->alias }}
                    </p>
                    <p>
                        Data: {{ $game->data }}
                    </p>
                    <p>
                        Hora: {{ $game->schedule }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection