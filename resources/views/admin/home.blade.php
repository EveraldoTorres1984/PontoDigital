@extends('adminlte::page')

@section('title', 'Painel')

@section('content_header')
    <h1>Painel de controle</h1>
@endsection

@section('content')
    <div class="col-md-3">
        <a href="{{ route('users.index') }}">
            <div class="small-box bg-info" style="cursor: pointer">
                <div class="inner">
                    <h3>{{ $userCount }}</h3>
                    <p>Funcionários</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-user"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Visão geral das tabelas</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Funcionário</th>
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
                                <td>{{$timeTable->user_id}}</td>
                                <td>{{$timeTable->date->format('d/m/Y')}}</td>
                                <td>@if (isset($timeTable->entrance_1))
                                    {{ Carbon\Carbon::parse($timeTable->entrance_1)->format('H:i') }}
                                    @else
                                    <a href="{{route('timetables.index')}}"><i class="fas fa-exclamation-triangle"></i></a>
                                @endif</td>
                                <td>@if (isset($timeTable->exit_1))
                                    {{ Carbon\Carbon::parse($timeTable->exit_1)->format('H:i') }}
                                    @else
                                    <a href="{{route('timetables.index')}}"><i class="fas fa-exclamation-triangle"></i></a>
                                @endif</td>
                                <td>@if (isset($timeTable->exit_1))
                                    {{ Carbon\Carbon::parse($timeTable->exit_1)->format('H:i') }}
                                    @else
                                    <a href="{{route('timetables.index')}}"><i class="fas fa-exclamation-triangle"></i></a>
                                @endif</td>
                                <td>@if (isset($timeTable->exit_2))
                                    {{ Carbon\Carbon::parse($timeTable->exit_2)->format('H:i') }}
                                    @else
                                    <a href="{{route('timetables.index')}}"><i class="fas fa-exclamation-triangle"></i></a>
                                @endif</td>
                               </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>        
    @endsection  
   
