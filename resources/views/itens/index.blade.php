@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Itens</h2>
            </div>
            <div class="pull-right">
                @can('item-create')
                    <a class="btn btn-success" href="{{ route('itens.create') }}"> Criar Novo Item</a>
                @endcan
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered mt-3">
        <tr>
            <th>No</th>
            <th>Modelo</th>
            <th>Especificações</th>
            <th>Descrição</th>
            <th>Localidade</th>
            <th>Status</th>
            <th>Usuário</th>
            <th width="280px">Ações</th>
        </tr>
        @foreach ($itens as $item)
        <tr>
            <td>{{ ++$i }}</td>
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
