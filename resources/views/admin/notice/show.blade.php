@extends('adminlte::page')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    <h3>{{ $address->local->alias }}</h3>
                </div>
                <div class="card-body">
                    <p>
                       Rua: {{ $address->street }}
                    </p>
                    <p>
                        Numero: {{ $address->number }}
                    </p>
                    <p>
                        Bairro: {{ $address->neighborhood }}
                    </p>
                    <p>
                       Local:  {{ $address->local_id }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection