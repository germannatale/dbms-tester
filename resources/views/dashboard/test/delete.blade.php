@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-trash-alt"></i> Test de Delete </h4>
                    </div>
                    <div class="card-body">
                        <p>
                            Este test borrara todos los libros e informara los resultados.
                        </p>
                        <form method="POST" action="{{route('test.delete')}}" enctype="multipart/form-data">
                            @csrf                    
                            <input type="hidden" name="test_tipo" value="delete">
                            <button type="submit" class="btn btn-success"><i class="fas fa-trash-alt"></i> Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @isset($resultados)
            {{-- Resultados --}}
            @include('dashboard.shared.resultados')
        @endif
    </div> 
</div>

@endsection