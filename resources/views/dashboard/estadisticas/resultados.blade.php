@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-list-ol"></i> Resultados de las Pruebas</h4>
                    </div>
                    <div class="card-body">
                        {{-- Filtro de busqueda --}}
                        {{-- <div class="row">
                            <div class="col-12">                         --}}
                                <div class="input-group"> 
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" id="ipt_filtrar_icon"><i class="fas fa-filter"></i></div>
                                    </div>
                                    <input type="text" id="ipt_filtrar" class="form-control" aria-describedby="ipt_filtrar_icon" placeholder="Escriba para filtrar por texto" onkeyup="aplicar_filtro()">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" onclick="quitar_filtro()"><span class="text-dark">Limpiar</span></button>
                                    </div>
                                </div>
                            {{-- </div>
                        </div> --}}
                        @if($resultados->count() > 0)
                            <div class="table-responsive mt-4">
                                <table class="table table-sm table-hover">
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
                                        <tr class="item-row">
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
                            </div>
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