@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4><i class="fas fa-tachometer-alt"></i> {{ __('Dashboard') }}</h4>
                </div>

                <div class="card-body">
                    <!-- Alerta de sucesso para mensagens -->
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <p>{{ __('Você está logado, ') }} <strong>{{ Auth::user()->name }}</strong>!</p>

                    <!-- Botões Empilhados -->
                    <div class="row mt-4">
                        <div class="col-12 mb-3">
                            <!-- Botão de Itens -->
                            <a href="{{ route('itens.index') }}" class="btn btn-outline-success w-100 shadow-sm d-flex align-items-center justify-content-between">
                                <span><i class="fa-solid fa-laptop"></i> Itens Registrados</span>
                                <span class="badge bg-danger rounded-pill">{{ $totalItens }}</span>
                            </a>
                        </div>

                        <div class="col-12 mb-3">
                            <!-- Botão de Usuários -->
                            <a href="{{ route('users.index') }}" class="btn btn-outline-primary w-100 shadow-sm d-flex align-items-center justify-content-between">
                                <span><i class="fas fa-users"></i> Usuários Ativos</span>
                                <span class="badge bg-success rounded-pill">{{ $totalUsuarios }}</span>
                            </a>
                        </div>

                        <div class="col-12">
                            <!-- Botão de Localidades -->
                            <a href="{{ route('localidades.index') }}" class="btn btn-outline-info w-100 shadow-sm">
                                <i class="fas fa-map-marker-alt"></i> Gerenciar Localidades
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
