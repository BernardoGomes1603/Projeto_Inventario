@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success mb-2" href="{{ route('users.create') }}"><i class="fa fa-plus"></i> Create New User</a>
        </div>
    </div>
</div>

<!-- Barra de busca -->
<form method="GET" action="{{ route('users.index') }}" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Search by name or email" value="{{ request()->get('search') }}">
        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
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
       <th><a href="?sort=name&direction={{ request('direction') == 'asc' ? 'desc' : 'asc' }}">Name</a></th>
       <th><a href="?sort=email&direction={{ request('direction') == 'asc' ? 'desc' : 'asc' }}">Email</a></th>
       <th>Roles</th>
       <th width="280px">Action</th>
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
             <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}"><i class="fa-solid fa-list"></i> Show</a>
             <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
              <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display:inline">
                  @csrf
                  @method('DELETE')

                  <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
              </form>
        </td>
    </tr>
   @endforeach
</table>

{!! $data->links('pagination::bootstrap-5') !!}

<!-- Botão para Manage Roles -->
<div class="d-flex justify-content-between mt-3">
    <a class="btn btn-outline-secondary" href="{{ route('roles.index') }}"><i class="fa-solid fa-user-shield"></i> Manage Roles</a>
</div>


@endsection
