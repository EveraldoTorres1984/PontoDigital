@extends('adminlte::page')

@section('title', 'Relógio de ponto')

@section('content_header')

    @include('flash-message')
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
                            <td>
                                @if (isset($timeTable->entrance_1))
                                    {{ Carbon\Carbon::parse($timeTable->entrance_1)->format('H:i') }}
                                @else
                                    <form action="{{ route('timetables.update', ['id' => $timeTable->id]) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $timeTable->id }}">
                                        <button type="submit" class="ml-2 btn btn-sm btn-primary">Entrada</button>
                                    </form>
                                @endif
                            </td>

                            <td>             
                                
                           {{-- codigo da saida para almoço --}}
                           
                            </td>
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

        setInterval(updateClock, 1000);
        updateClock();
    </script>
    <script src="/js/app.js"></script>
@endsection


{{ $timeTables->links('pagination::bootstrap-4') }}
@endsection
