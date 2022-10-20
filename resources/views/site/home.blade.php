@extends('site.layout')

@section('content')
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">Gerencie horários, cadastre, remova e edite funcionários</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Clique abaixo para fazer login ou se cadastrar!</p>
                    <a class="btn btn-primary btn-xl" href="{{route('login')}}">Entrar</a>
                </div>
            </div>
        </div>
    </header>

@endsection
