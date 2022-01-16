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
            {{-- Resultados --}}
            @include('dashboard.shared.resultados')
        @endif
    </div> 
</div>

@endsection