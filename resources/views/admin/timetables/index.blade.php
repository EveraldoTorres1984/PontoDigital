@extends('adminlte::page')

@section('title', 'Relógio de ponto')

@section('content_header')

    @include('flash-message')
    <h1 class="mb-5">Relógio de ponto</h1>    
       
    <div class="row align-middle">
        <form action="{{ route('timetables.store') }}" method="POST">
            @csrf          
            <button type="submit" class="ml-5 md-4 btn btn-sm btn-success">Registrar data atual</button>
        </form>
        <div class="digital mb-3" style="margin-left: 300px; background-color: #BDB76B; padding: 10px; border-radius: 50px;">--:--:--</div>     
    </div>

@endsection

@section('content')
    
    <div class="card text-center">
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
                                    <form action="{{ route('entrance_1.update', ['id' => $timeTable->id]) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $timeTable->id }}">
                                        <button type="submit" class="ml-2 btn btn-sm btn-primary">Entrada</button>
                                    </form>
                                @endif
                            </td>

                            <td>
                                @if (isset($timeTable->exit_1))
                                    {{ Carbon\Carbon::parse($timeTable->exit_1)->format('H:i') }}
                                @elseif (isset($timeTable->entrance_1))
                                    <form action="{{ route('exit_1.update', ['id' => $timeTable->id]) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $timeTable->id }}">
                                        <button type="submit" class="ml-2 btn btn-sm btn-warning">Saída</button>
                                    </form>
                                @endif

                            </td>
                            <td>
                                @if (isset($timeTable->entrance_2))
                                    {{ Carbon\Carbon::parse($timeTable->entrance_2)->format('H:i') }}
                                @elseif (isset($timeTable->exit_1))
                                    <form action="{{ route('entrance_2.update', ['id' => $timeTable->id]) }}" method="POST">
                                        {{$timeTable->exit_2}} @method('PUT')
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $timeTable->id }}">
                                        <button type="submit" class="ml-2 btn btn-sm btn-primary">Entrada tarde</button>
                                    </form>
                                @endif
                            </td>
                            <td>
                                @if (isset($timeTable->exit_2))
                                    {{ Carbon\Carbon::parse($timeTable->exit_2)->format('H:i') }}
                                @elseif (isset($timeTable->entrance_2))
                                    <form action="{{ route('exit_2.update', ['id' => $timeTable->id]) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $timeTable->id }}">
                                        <button type="submit" class="ml-2 btn btn-sm btn-danger">Final Expediente</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{ $timeTables->links('pagination::bootstrap-4') }}
    @endsection


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
       
    
@endsection




