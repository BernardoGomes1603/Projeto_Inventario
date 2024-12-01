@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="d-flex justify-content-between">
            <div class="pull-left">
                <h2>Gestão de Usuários</h2>
            </div>
            <div class="pull-right">
                <!-- Botões lado a lado -->
                <a class="btn btn-success mb-2" href="{{ route('users.create') }}"><i class="fa fa-plus"></i> Criar Novo Usuário</a>
                <a class="btn btn-outline-secondary mb-2 ml-2" href="{{ route('roles.index') }}"><i class="fa-solid fa-user-shield"></i> Gerenciar Funções</a>
            </div>
        </div>
    </div>
</div>

<!-- Barra de busca -->
<form method="GET" action="{{ route('users.index') }}" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Buscar por nome ou email" value="{{ request()->get('search') }}">
        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
    </div>
</form>

@session('success')
    <div class="alert alert-success" role="alert">
        {{ $value }}
    </div>
@endsession

<table class="table table-bordered">
   <tr>
       <th><a href="?sort=id&direction={{ request('direction') == 'asc' ? 'desc' : 'asc' }}">No</a></th>
       <th><a href="?sort=name&direction={{ request('direction') == 'asc' ? 'desc' : 'asc' }}">Nome</a></th>
       <th><a href="?sort=email&direction={{ request('direction') == 'asc' ? 'desc' : 'asc' }}">Email</a></th>
       <th>Funções</th>
       <th width="280px">Ação</th>
   </tr>
   @foreach ($data as $key => $user)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
          @if(!empty($user->getRoleNames()))
            @foreach($user->getRoleNames() as $v)
               <label class="badge bg-success">{{ $v }}</label>
            @endforeach
          @endif
        </td>
        <td>
             <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}"><i class="fa-solid fa-list"></i> Exibir</a>
             <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
              <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display:inline">
                  @csrf
                  @method('DELETE')

                  <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Excluir</button>
              </form>
        </td>
    </tr>
   @endforeach
</table>

{!! $data->links('pagination::bootstrap-5') !!}

@endsection
