@extends('adminlte::page')

@section('title', 'Relógio de ponto')

@section('content_header')
    <h1 class="mb-5">Relógio de ponto</h1>
    <div class="row">
        <form action="{{ route('timetables.store') }}" method="POST">
            @csrf
            <input type="date" name="date">
            <button type="submit" class="ml-4 btn btn-sm btn-success">Registrar</button>
        </form>
    </div>

@endsection

@section('content')

@if (session('msg'))
<div class="alert alert-info">
    {{ session('msg') }}
</div>
@endif

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Entrada</th>
                        <th>Saída Almoço</th>
                        <th>Volta Almoço</th>
                        <th>Fim de Expediente</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($timeTables as $timeTable)
                        <tr>
                            <td>{{ $timeTable->date->format('d/m/Y') }}</td>
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
