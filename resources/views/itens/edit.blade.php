@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Editar Item</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm mb-2" href="{{ route('itens.index') }}"><i class="fa fa-arrow-left"></i> Voltar</a>
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

<form action="{{ route('itens.update', $item->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Modelo:</strong>
                <input type="text" name="modelo" value="{{ $item->modelo }}" class="form-control" placeholder="Modelo">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Especificações:</strong>
                <textarea name="especificacoes" class="form-control" placeholder="Especificações">{{ $item->especificacoes }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição:</strong>
                <textarea name="descricao" class="form-control" placeholder="Descrição">{{ $item->descricao }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Localidade:</strong>
                <select name="idLocalidade" class="form-control">
                    <option value="">Selecione a Localidade</option>
                    @foreach ($localidades as $localidade)
                        <option value="{{ $localidade->id }}" {{ $item->idLocalidade == $localidade->id ? 'selected' : '' }}>
                            {{ $localidade->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Usuário:</strong>
                <select name="idUser" class="form-control">
                    <option value="">Selecione o Usuário</option>
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ $item->idUser == $usuario->id ? 'selected' : '' }}>
                            {{ $usuario->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                <select name="idStatus" class="form-control">
                    <option value="">Selecione o Status</option>
                    @foreach ($status as $stat)
                        <option value="{{ $stat->id }}" {{ $item->idStatus == $stat->id ? 'selected' : '' }}>
                            {{ $stat->descricao }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary btn-sm mb-2 mt-2"><i class="fa-solid fa-floppy-disk"></i> Salvar</button>
        </div>
    </div>
</form>

@endsection
