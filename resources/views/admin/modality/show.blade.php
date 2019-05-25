@extends('adminlte::page')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    <h3>{{ $modality->id }}</h3>
                </div>
                <div class="card-body">
                    <p>
                       Nome: {{ $modality->name_modality }}
                    </p>
                    <p>
                        Quantidade Jogadores: {{ $modality->total_players }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection