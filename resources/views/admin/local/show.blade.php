@extends('adminlte::page')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    <h3>{{ $local->id }}</h3>
                </div>
                <div class="card-body">
                    <p>
                       Nome: {{ $local->alias }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection