@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Localidades</h2>
            </div>
            <div class="pull-right">
                @can('localidade-create')
                    <a class="btn btn-success" href="{{ route('localidades.create') }}"> Criar Nova Localidade</a>
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
            <th>Nome</th>
            <th>Endereço</th>
            <th>Contato</th>
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
