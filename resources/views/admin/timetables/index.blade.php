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
                            <td>
                                <div id="forms">
                                    {{ $timeTable->entrance_1 }}
                                    <form method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $timeTable->id }}">
                                        <button class="ml-2 btn btn-sm btn-primary" name="entrance1" id="btnEntrance{{ $timeTable->id }}"
                                            onclick="hideButton({{ $timeTable->id }});">Entrada</button>
                                    </form>
                                </div>
                            </td>
                            <td>{{ $timeTable->exit_1 }}</td>
                            <td>{{ $timeTable->entrance_2 }}</td>
                            <td>{{ $timeTable->exit_2 }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@section('css')
    
@endsection
@section('js')

    <script>
        function hideButton(id) {

            let btnEntrance = document.querySelector('#btnEntrance' + id);
            let td = document.querySelector('td');

            if (document.querySelector('td').value !== "") {
                btnEntrance.style.display = "none";
            }
            
        }
    </script>
@endsection


{{ $timeTables->links('pagination::bootstrap-4') }}
@endsection
