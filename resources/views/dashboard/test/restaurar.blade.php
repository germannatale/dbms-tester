@extends('dashboard.base')

@section('content')

@php
    // Puedo tomar la cantidad de cualquier DB ya que los test son simetricos
    $books_cant = DB::table('mariadb_books')->count();        
@endphp

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-recycle"></i> Restaurar DB </h4>
                    </div>
                    <div class="card-body">
                        <p>
                           Esto borrara todas los datos de las DB presentes. Tambien reseteara las estadisticas de los test realizados.
                        </p>
                        <p>
                            <em>Actualmente se encuentran {{ $books_cant }} libros en la DB.</em>
                        </p>
                        <form method="POST" action="{{route('restaurar.destroy')}}" enctype="multipart/form-data">
                            @csrf                    
                            <input type="hidden" name="resultado" value="delete">
                            <button type="submit" class="btn btn-danger"><i class="fas fa-recycle"></i> Blanquear Datos</button>
                        </form>
                        @isset($resultado)
                            <p class="text-success">
                                {{$resultado}}
                            </p>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection