@extends('dashboard.base')

@section('content')

<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4><i class="fas fa-bolt"></i> Artefactos Electricos</h4></div>
            <div class="card-body">
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur maiores eius neque laudantium tempora? 
                    Atque cupiditate consectetur a nihil sapiente nisi dolor perspiciatis! Ipsam, labore. Minima unde ex possimus. 
                    Odit.Voluptates voluptatum modi necessitatibus inventore.
                </p>
                
                <button class="btn btn-success"><i class="fas fa-plus"></i> Nuevo Artefacto</button>

                <table class="table table-striped table-sm datatable mt-3">                                
                    <thead>
                        <tr>                                    
                            <th>Artefacto</th>
                            <th>Categoría</th>                                        
                            <th>Energia</th>
                            <th>Consumo</th>
                            <th>Uso Diario</th>
                            <th>Calor Res</th>                              
                            <th class="text-right">Acciones</th>                                
                        </tr>
                    </thead>
                    <tbody>
                        <tr>                                   
                            <td>Lampara LED 5W</td>
                            <td>Iluminación</td>
                            <td>Electrica</td>
                            <td>5W</td>
                            <td>6 hs</td>
                            <td>3,5W</td>
                            <td class="text-right">
                                <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>                                        
                                    <a href="#" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>TV LED 50 pulgadas</td>
                            <td>Electronica</td>
                            <td>Electrica</td>
                            <td>85W</td>
                            <td>10 hs</td>
                            <td>70W</td>
                            <td class="text-right">
                                <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>                                        
                                    <a href="#" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Heladera</td>
                            <td>Linea Blanca</td>
                            <td>Electrica</td>
                            <td>250W</td>
                            <td>24 hs</td>
                            <td>150W</td>
                            <td class="text-right">
                                <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>                                        
                                    <a href="#" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection