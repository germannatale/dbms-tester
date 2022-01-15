@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-file-alt"></i> Test de Blob </h4>
                    </div>
                    <div class="card-body">
                        <p>
                            Este test añadira el siguiente archivo <a href="{{ asset('assets/file/ebook.txt') }}">ebook.txt</a> a cada uno de los libros e informara los resultados.
                        </p>
                        <form method="POST" action="{{route('test.blob')}}" enctype="multipart/form-data">
                            @csrf                    
                            <input type="hidden" name="test_tipo" value="blob">
                            <button type="submit" class="btn btn-success"><i class="fas fa-file-alt"></i> Agregar Blob</button>
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