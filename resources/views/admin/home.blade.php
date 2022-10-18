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

                </div>
            </div>
        </div>
    @endsection
