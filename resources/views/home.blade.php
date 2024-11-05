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

                    <p>{{ __('Você está logado!') }}</p>

                    <!-- Informações do usuário em Cards -->
                    <div class="row mt-4">
                        <!-- Exemplo: Card de usuários -->
                        <div class="col-md-4 mb-3">
                            <div class="card text-center shadow-sm">
                                <div class="card-body">
                                    <h5><i class="fas fa-users fa-2x text-primary"></i></h5>
                                    <h6 class="card-title mt-2">Usuários Ativos</h6>
                                    <p class="card-text display-6">42</p>
                                </div>
                            </div>
                        </div>

                        <!-- Exemplo: Card de notificações -->
                        <div class="col-md-4 mb-3">
                            <div class="card text-center shadow-sm">
                                <div class="card-body">
                                    <h5><i class="fas fa-bell fa-2x text-warning"></i></h5>
                                    <h6 class="card-title mt-2">Notificações</h6>
                                    <p class="card-text display-6">3</p>
                                </div>
                            </div>
                        </div>

                        <!-- Exemplo: Card de configurações -->
                        <div class="col-md-4 mb-3">
                            <div class="card text-center shadow-sm">
                                <div class="card-body">
                                    <h5><i class="fas fa-cogs fa-2x text-success"></i></h5>
                                    <h6 class="card-title mt-2">Configurações</h6>
                                    <p class="card-text display-6">5</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Acesso rápido -->
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <a href="{{ route('users.index') }}" class="btn btn-outline-primary w-100">
                                <i class="fas fa-user-cog"></i> Gerenciar Usuários
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary w-100">
                                <i class="fas fa-user-shield"></i> Gerenciar Funções
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('localidades.index') }}" class="btn btn-outline-info w-100">
                                <i class="fas fa-map-marker-alt"></i> Localidades
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
