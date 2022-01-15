@extends('dashboard.base')

@section('content')

@php
    // Puedo tomar la cantidad de cualquier DB ya que los test son simetricos
    $books_cant = DB::table('mariadb_books')->count();
    // año actual
    $year = date('Y');    
@endphp

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-edit"></i> Test de Update </h4>
                    </div>
                    <div class="card-body">
                        <p>
                            Este test recuperara de cada DB los libros que coincidan con el año proporcionado por el usuario. 
                            Luego medira el tiempo que le llevo actualizar dichos registros cambiando el nombre del libro original 
                            por el mismo concantenando al final el año del libro.
                        </p>
                        <form method="POST" action="{{route('test.update')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                            <label for="test_value">Actualizar libros donde año sea igual a:</label>
                            <input type="number" max="{{$year}}" min="1970" step="1" class="form-control" name="test_value"  id="test_value" placeholder="Ingrese un año valido">
                            <input type="hidden" name="test_tipo" value="update">                            
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fas fa-edit"></i> Update</button>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
        @isset($resultados)
            <div class="row">
                {{-- Resultados --}}
                <div class="col-sm-12 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="fas fa-chart-line"></i> Resultados</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                Tipo de Test: {{$resultados['test_tipo']}}
                            </p>
                            <p>
                                Registros Afectados: {{$resultados['test_cant']}}
                            </p>
                            <p>
                                Tiempo de la base de datos <b>MariaDB</b>: {{$resultados['tiempo_maria']}} segundos.
                            </p>
                            <p>
                                Tiempo de la base de datos <b>PostgreSQL</b>: {{$resultados['tiempo_postgres']}} segundos.
                            </p>
                            <p>
                                Tiempo de la base de datos <b>MongoDB</b>: {{$resultados['tiempo_mongo']}} segundos.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div> 
</div>

@endsection