@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="d-flex justify-content-between align-items-center">
                <div class="pull-left">
                    <h2>Itens</h2>
                </div>
                <div class="pull-right">
                    <!-- Botão de Criar Novo Item com ícone de mais -->
                    @can('item-create')
                        <a class="btn btn-success mb-2" href="{{ route('itens.create') }}">
                            <i class="fa fa-plus"></i> Criar Novo Item
                        </a>
                    @endcan
                    <!-- Botão de Gerenciar Status -->
                    <a class="btn btn-outline-secondary mb-2 ml-2" href="{{ route('status.index') }}">
                        <i class="fa-solid fa-gear"></i> Gerenciar Status
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Barra de busca e filtro -->
    <form method="GET" action="{{ route('itens.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar por modelo, especificações ou descrição" value="{{ request()->get('search') }}">
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
        </div>
    </form>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <!-- Tabela de Itens -->
    <table class="table table-bordered mt-3">
    <tr>
        <th><a href="{{ route('itens.index', ['sort_by' => 'id', 'order' => request()->get('order') == 'asc' ? 'desc' : 'asc']) }}">No</a></th>
        <th><a href="{{ route('itens.index', ['sort_by' => 'modelo', 'order' => request()->get('order') == 'asc' ? 'desc' : 'asc']) }}">Modelo</a></th>
        <th><a href="{{ route('itens.index', ['sort_by' => 'especificacoes', 'order' => request()->get('order') == 'asc' ? 'desc' : 'asc']) }}">Especificações</a></th>
        <th><a href="{{ route('itens.index', ['sort_by' => 'descricao', 'order' => request()->get('order') == 'asc' ? 'desc' : 'asc']) }}">Descrição</a></th>
        <th><a href="{{ route('itens.index', ['sort_by' => 'localidade', 'order' => request()->get('order') == 'asc' ? 'desc' : 'asc']) }}">Localidade</a></th>
        <th><a href="{{ route('itens.index', ['sort_by' => 'status', 'order' => request()->get('order') == 'asc' ? 'desc' : 'asc']) }}">Status</a></th>
        <th><a href="{{ route('itens.index', ['sort_by' => 'user', 'order' => request()->get('order') == 'asc' ? 'desc' : 'asc']) }}">Usuário</a></th>
        <th width="280px">Ações</th>
    </tr>
    @foreach ($itens as $key => $item)
    <tr>
        <td>{{ $itens->firstItem() + $loop->index }}</td>
        <td>{{ $item->modelo }}</td>
        <td>{{ $item->especificacoes }}</td>
        <td>{{ $item->descricao }}</td>
        <td>{{ $item->localidade->nome ?? 'Não Definida' }}</td>
        <td>{{ $item->status->descricao ?? 'Não Definido' }}</td>
        <td>{{ $item->user->name ?? 'Não Atribuído' }}</td>
        <td>
            <form action="{{ route('itens.destroy', $item->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('itens.show', $item->id) }}">Ver</a>
                @can('item-edit')
                    <a class="btn btn-primary" href="{{ route('itens.edit', $item->id) }}">Editar</a>
                @endcan
                @csrf
                @method('DELETE')
                @can('item-delete')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                @endcan
            </form>
        </td>
    </tr>
    @endforeach
</table>

    {!! $itens->links() !!}
</div>
@endsection
