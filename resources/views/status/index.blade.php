@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb d-flex justify-content-between align-items-center">
            <div class="pull-left">
                <h2>Status</h2>
            </div>
            <div class="pull-right">
                @can('status-create')
                    <a class="btn btn-success" href="{{ route('status.create') }}">
                        <i class="fa fa-plus"></i> Criar Novo Status
                    </a>
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
            <th>Descrição</th>
            <th width="280px">Ações</th>
        </tr>
        @foreach ($status as $s)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $s->descricao }}</td>
            <td>
                <form action="{{ route('status.destroy', $s->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    @can('status-delete')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $status->links() !!}
</div>
@endsection
