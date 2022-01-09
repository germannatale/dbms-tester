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
                        <h4><i class="fas fa-search"></i> Test de Select </h4>
                    </div>
                    <div class="card-body">
                        <p>
                            Este test recuperara de cada DB los datos que coincidan con el valor proporcionado por el usuario. 
                            Puede utilizar el test where para buscar un libro por el año de publicación porporcionado o el 
                            test like para buscar un libro por parte del nombre. Los resultados devolveran el tiempo de consulta 
                            y tambien la cantidad de registros afectados. Tenga presente que previo a este test debera tener algunos 
                            registros precargados en las DBs provistos por el test de insert.
                        </p>
                        <form method="POST" action="{{route('test.select')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                            <label for="test_value">Buscar por where año es igual a</label>
                            <input type="number" max="{{$year}}" min="1970" step="1" class="form-control" name="test_value"  id="test_value" placeholder="Ingrese un año valido">
                            <input type="hidden" name="test_tipo" value="where">                            
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fas fa-search"></i> Buscar where</button>
                        </form>
                        <form method="POST" action="{{route('test.select')}}" enctype="multipart/form-data" class="mt-3">
                            @csrf
                            <div class="form-group">
                            <label for="test_value">Buscar por like el titulo es</label>
                            <input type="text" class="form-control" name="test_value"  id="test_value" placeholder="Ingrese parte del titulo de un libro">
                            <input type="hidden" name="test_tipo" value="like">                            
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fas fa-search"></i> Buscar like</button>
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
                            <p>
                                Tests Relizados: {{$resultados['test_cant']}}
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