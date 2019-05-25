@extends('adminlte::page')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    <h3>{{ $punctuation->id }}</h3>
                </div>
                <div class="card-body">
                    <p>
                        Time: {{ $punctuation->team_id }}
                    </p>
                    <p>
                       Total Pontos: {{ $punctuation->total_points }}
                    </p>
                    <p>
                        Total Vitórias: {{ $punctuation->total_wins }}
                    </p>
                    <p>
                        Total Derrotas: {{ $punctuation->total_loses }}
                    </p>
                    <p>
                       Total Empates:  {{ $punctuation->total_draw }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection