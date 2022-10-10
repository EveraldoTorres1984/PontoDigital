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
        <div class="digital ml-5">--:--:--</div>
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
                            <div id="forms">
                                <td>
                                    {{ $timeTable->entrance_1 }}
                                    <form action="{{ route('timetables.update') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $timeTable->id }}">
                                        <button class="ml-2 btn btn-sm btn-primary" name="entrance_1" id="btnEntrance{{ $timeTable->id }}" onclick="hideButton({{ $timeTable->id }});">Entrada</button>
                                    </form>
                                </td>
                            </div>
                            <td>{{ $timeTable->exit_1 }}</td>
                            <td>{{ $timeTable->entrance_2 }}</td>
                            <td>{{ $timeTable->exit_2 }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



@section('js')

    <script>
        let digitalElement = document.querySelector('.digital');

        function updateClock() {
            let now = new Date();
            let hour = now.getHours();
            let minute = now.getMinutes();
            let second = now.getSeconds();

            digitalElement.innerHTML = `${fixZero(hour)}:${fixZero(minute)}:${fixZero(second)}`;
        }

        function fixZero(time) {
            return time < 10 ? `0${time}` : time;
        }

        function hideButton(id) {

            let btnEntrance = document.querySelector('#btnEntrance' + id);
            let td = document.querySelector('td');

            if (document.querySelector('td').value !== "") {
                btnEntrance.style.display = "none";
            }
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>
@endsection


{{ $timeTables->links('pagination::bootstrap-4') }}
@endsection
