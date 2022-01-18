@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-list-ol"></i> Resultados de las Pruebas</h4>
                    </div>
                    <div class="card-body">
                        @if($resultados->count() > 0)
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Test</th>
                                        <th>Cantidad</th>
                                        <th>Registros Afectados</th>
                                        <th>MariaDB</th>
                                        <th>MongoDB</th>
                                        <th>PostgreSQL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($resultados as $resultado)
                                    <tr>
                                        <td>{{ $resultado['test_tipo'] }}</td>
                                        <td>{{ $resultado['test_cant'] }}</td>
                                        <td>{{ $resultado['test_value'] }}</td>
                                        <td>{{ $resultado['tiempo_maria'] }}</td>
                                        <td>{{ $resultado['tiempo_mongo'] }}</td>
                                        <td>{{ $resultado['tiempo_postgres'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                        <p>
                            No hay resultados que mostrar. Ejecute la pruebas y consulte esta pantalla nuevamente.
                        </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>        
    </div> 
</div>

@endsection