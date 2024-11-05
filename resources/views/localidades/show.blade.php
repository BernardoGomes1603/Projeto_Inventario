@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Mostrar Localidade</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('localidades.index') }}"> Voltar</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nome:</strong>
            {{ $localidade->nome }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Endereço:</strong>
            {{ $localidade->endereco }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Contato:</strong>
            {{ $localidade->contato }}
        </div>
    </div>
</div>

<p class="text-center text-primary"><small>Tutorial adaptado</small></p>
@endsection
