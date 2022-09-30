@extends('adminlte::page')

@section('title', 'Relógio de ponto')

@section('content_header')
    <h1 class="mb-5">Relógio de ponto</h1>
    <div class="row">
        <a href="{{ route('timetables.create') }}" class="ml-3 btn btn-sm btn-success">Registrar Entrada</a>
        <a href="{{ route('timetables.create') }}" class="ml-3 btn btn-sm btn-danger">Registrar Saída Almoço</a>
        <a href="{{ route('timetables.create') }}" class="ml-3 btn btn-sm btn-success">Registrar Volta Almoço</a>
        <a href="{{ route('timetables.create') }}" class="ml-3 btn btn-sm btn-danger">Registrar Saída</a>
    </div>


@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Entrada</th>
                        <th>Saída Almoço</th>
                        <th>Volta Almoço</th>
                        <th>Fim de Expediente</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($timeTables as $timeTable)
                        <tr>
                            <td>{{ $timeTable->entrance_1 }}</td>
                            <td>{{ $timeTable->exit_1 }}</td>
                            <td>{{ $timeTable->entrance_2 }}</td>
                            <td>{{ $timeTable->exit_2 }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{ $timeTables->links('pagination::bootstrap-4') }}
@endsection
