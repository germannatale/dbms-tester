@extends('dashboard.base')

@section('content')

<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4><i class="fas fa-burn"></i> Artefactos Gas</h4></div>
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
                            <td>Horno</td>
                            <td>Cocina</td>
                            <td>Gas</td>
                            <td>0.32 m3/h</td>
                            <td>1 hs</td>
                            <td>Desconocido</td>
                            <td class="text-right">
                                <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>                                        
                                    <a href="#" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>                       
                        <tr>
                            <td>Estufa Tiro Balanceado 4500 calorias</td>
                            <td>Calefacción</td>
                            <td>Gas</td>
                            <td>0.48 m3/h</td>
                            <td>6 hs</td>
                            <td>Desconocido</td>
                            <td class="text-right">
                                <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>                                        
                                    <a href="#" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Hornalla Anafe</td>
                            <td>Cocina</td>
                            <td>Gas</td>
                            <td>0.1 m3/h</td>
                            <td>3 hs</td>
                            <td>Desconocido</td>
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