@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Adicionar Novo Item</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm" href="{{ route('itens.index') }}"><i class="fa fa-arrow-left"></i> Voltar</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Houve alguns problemas com sua entrada.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('itens.store') }}" method="POST">
    @csrf

    <div class="row">
        <!-- Campo Modelo -->
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <label for="modelo"><strong>Modelo:</strong></label>
            <input id="modelo" type="text" name="modelo" class="form-control" placeholder="Modelo" value="{{ old('modelo') }}" required>
        </div>

        <!-- Campo Especificações -->
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <label for="especificacoes"><strong>Especificações:</strong></label>
            <textarea id="especificacoes" name="especificacoes" class="form-control" placeholder="Especificações">{{ old('especificacoes') }}</textarea>
        </div>

        <!-- Campo Descrição -->
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <label for="descricao"><strong>Observação:</strong></label>
            <textarea id="descricao" name="descricao" class="form-control" placeholder="Descrição">{{ old('descricao') }}</textarea>
        </div>

        <!-- Campo Localidade -->
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <label for="localidade_id"><strong>Localidade:</strong></label>
            <select id="localidade_id" name="localidade_id" class="form-control" required>
                <option value="">Selecione a Localidade</option>
                @foreach ($localidade as $localidade)
                    <option value="{{ $localidade->id }}" {{ old('localidade_id') == $localidade->id ? 'selected' : '' }}>
                        {{ $localidade->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Campo Usuário -->
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <label for="user_id"><strong>Usuário:</strong></label>
            <select id="user_id" name="user_id" class="form-control" required>
                <option value="">Selecione o Usuário</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Campo Status -->
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <label for="status_id"><strong>Status:</strong></label>
            <select id="status_id" name="status_id" class="form-control" required>
                <option value="">Selecione o Status</option>
                @foreach ($statuses as $status)
                    <option value="{{ $status->id }}" {{ old('status_id') == $status->id ? 'selected' : '' }}>
                        {{ $status->descricao }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Botão Salvar -->
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary btn-sm mb-3 mt-2"><i class="fa-solid fa-floppy-disk"></i> Salvar</button>
        </div>
    </div>
</form>
@endsection
