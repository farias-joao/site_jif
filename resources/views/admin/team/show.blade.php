@extends('adminlte::page')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    <table class="table" id="datatable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Técnico</th>
                            <th>Nome</th>
                            <th>Modalidade</th>
                            <th>Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($teams as $team)
                            <tr>
                                <td>{{ $team->id }}</td>
                                <td>{{ $team->user_id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->modality_id }}</td>
                                <td><a class="btn btn-primary"
                                       href="{{ action('TeamController@edit', $team->id) }}"
                                       title="Editar time">Editar</a><br>
                                </td>

                                <td><form method="post"
                                          action="{{ action('TeamController@destroy', $team->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-danger delete-button"
                                                onclick="return confirm('Tem certeza?');" )>Apagar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection