@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                      <h4><i class="fas fa-users"></i> Usuarios</h4>
                    </div>
                    <div class="card-body">

                        <p>Maneje desde esta pantalla la creación y edición de los uuarios del sistema.</p>

                        <button class="btn btn-success mb-3"><i class="fas fa-plus"></i> Nuevo Usuario</button>

                        <table class="table table-striped datatable">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>E-mail</th>
                            <th>Roles</th>
                            <th>Verificado</th>
                            <th class="text-right">Acciones</th>                            
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($users as $user)
                            <tr>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->menuroles }}</td>
                              <td>{{ $user->email_verified_at }}</td>
                              <td class="text-right">
                                <form action="{{ route('users.destroy', $user->id ) }}" method="POST">
                                <a href="{{ url('/users/' . $user->id) }}" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></a>                             
                                <a href="{{ url('/users/' . $user->id . '/edit') }}" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>                              
                                @if( $you->id !== $user->id )                               
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
                                @endif
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

@endsection


@section('javascript')

@endsection

