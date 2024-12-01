@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Detalhes do Item</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('itens.index') }}"> Voltar</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Modelo:</strong>
            {{ $item->modelo }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Especificações:</strong>
            {{ $item->especificacoes }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descrição:</strong>
            {{ $item->descricao }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Localidade:</strong>
            {{ $item->localidade->nome ?? 'Não atribuído' }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Usuário Responsável:</strong>
            {{ $item->user->name ?? 'Não atribuído' }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Status:</strong>
            {{ $item->status->descricao ?? 'Não atribuído' }}
        </div>
    </div>
</div>

<p class="text-center text-primary"><small>CRUD adaptado para Itens</small></p>
@endsection
