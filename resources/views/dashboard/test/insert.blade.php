@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-plus"></i> Test de Inserts </h4>
                    </div>
                    <div class="card-body">
                        <p>
                            Este test permite insertar datos en las 3 bases de datos. Utilice el formulario para elegir la cantidad 
                            de registros a insertar. Para ello se utlizara la libreria <b>faker</b> para generar datos aleatorios. 
                            Las 3 bases de datos insertaran los mismos datos de registros igual en el mismo orden y con la misma cantidad 
                            de registros. El proceso se hace uno a uno. Se recomienda usar valores menores a 100.000 de registros.
                        </p>
                        <form method="POST" action="{{route('test.insert')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                            <label for="test_value">Cantidad de Inserts</label>
                            <input type="number" type="number" max="100000" step="1" class="form-control" name="test_value"  id="test_value" placeholder="">
                            <input type="hidden" name="test_tipo" value="insert">                            
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Insertar</button>
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