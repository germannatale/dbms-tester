@extends('dashboard.base')

@section('content')


<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4><i class="fas fa-user-tag"></i> Roles</h4></div>
            <div class="card-body">
                
                    <a class="btn btn-success" href="{{ route('roles.create') }}"><i class="fas fa-plus"></i> Nuevo Rol</a>
                
                <br>
                <div class="table" style="padding-top: 20px">
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Jerarquía</th>
                                <th>Creado</th>
                                <th>Actualizado</th>
                                <th class="text-right">Acciones</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>
                                        {{ $role->name }}
                                    </td>
                                    <td>
                                        {{ $role->hierarchy }}
                                    </td>
                                    <td>
                                        {{ $role->created_at }}
                                    </td>
                                    <td>
                                        {{ $role->updated_at }}
                                    </td>
                                    <td class="text-right">
                                        <form action="{{ route('roles.destroy', $role->id ) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <a class="btn btn-sm btn-success" href="{{ route('roles.up', ['id' => $role->id]) }}">
                                                <i class="fas fa-chevron-up"></i> 
                                            </a>
                                            <a class="btn btn-sm btn-success" href="{{ route('roles.down', ['id' => $role->id]) }}">
                                                <i class="fas fa-chevron-down"></i>  
                                            </a>
                                            <a href="{{ route('roles.show', $role->id ) }}" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('roles.edit', $role->id ) }}" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>
                                        
                                            <button class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    </td>                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('javascript')

@endsection