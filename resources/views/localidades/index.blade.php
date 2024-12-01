@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb d-flex justify-content-between align-items-center">
            <div class="pull-left">
                <h2>Localidades</h2>
            </div>
            <div class="pull-right">
                @can('localidade-create')
                    <a class="btn btn-success" href="{{ route('localidades.create') }}">
                        <i class="fa fa-plus"></i> Criar Nova Localidade
                    </a>
                @endcan
            </div>
        </div>
    </div>

    <!-- Barra de busca e filtros -->
    <form method="GET" action="{{ route('localidades.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar por nome, endereço ou contato" value="{{ request()->get('search') }}">
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
        </div>
    </form>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <!-- Tabela de Localidades -->
    <table class="table table-bordered mt-3">
        <tr>
            <th><a href="{{ route('localidades.index', ['sort' => 'id', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">No</a></th>
            <th><a href="{{ route('localidades.index', ['sort' => 'nome', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">Nome</a></th>
            <th><a href="{{ route('localidades.index', ['sort' => 'endereco', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">Endereço</a></th>
            <th><a href="{{ route('localidades.index', ['sort' => 'contato', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">Contato</a></th>
            <th width="280px">Ações</th>
        </tr>
        @foreach ($localidades as $localidade)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $localidade->nome }}</td>
            <td>{{ $localidade->endereco }}</td>
            <td>{{ $localidade->contato }}</td>
            <td>
                <form action="{{ route('localidades.destroy', $localidade->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('localidades.show', $localidade->id) }}">Ver</a>
                    @can('localidade-edit')
                        <a class="btn btn-primary" href="{{ route('localidades.edit', $localidade->id) }}">Editar</a>
                    @endcan
                    @csrf
                    @method('DELETE')
                    @can('localidade-delete')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $localidades->links() !!}
</div>
@endsection
