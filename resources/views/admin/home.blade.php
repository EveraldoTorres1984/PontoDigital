@extends('adminlte::page')

@section('title', 'Painel')

@section('content_header')
    <h1>Painel de controle</h1>
@endsection

@section('content')
    <div class="col-md-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $userCount }}</h3>
                <p>Funcionários</p>
            </div>
            <div class="icon">
                <i class="far fa-fw fa-user"></i>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Controle de horário do funcionários</h3>
                </div>
                <div class="card-body">
                    <canvas id="pagePie"></canvas>
                </div>
            </div>
        </div>
    @endsection
