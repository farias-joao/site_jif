@extends('adminlte::page')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    <h3>{{ $player->id }}</h3>
                </div>
                <div class="card-body">
                    <p>
                       Nome: {{ $player->name_player }}
                    </p>
                    <p>
                        RA: {{ $player->ra_player }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection