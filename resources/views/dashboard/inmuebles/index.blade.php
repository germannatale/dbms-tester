@extends('dashboard.base')

@section('content')

<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4><i class="fas fa-home"></i> Inmuebles</h4></div>
            <div class="card-body">
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur maiores eius neque laudantium tempora? 
                    Atque cupiditate consectetur a nihil sapiente nisi dolor perspiciatis! Ipsam, labore. Minima unde ex possimus. 
                    Odit.Voluptates voluptatum modi necessitatibus inventore.
                </p>
                
                <button class="btn btn-success"><i class="fas fa-plus"></i> Nuevo Inmueble</button>

                <table class="table table-striped table-sm datatable mt-3">                                
                    <thead>
                        <tr>                                    
                            <th>Nombre</th>
                            <th>Tipo</th>                                        
                            <th>Moradores</th>
                            <th>Antiguedad</th>
                            <th>Ambientes</th>
                            <th>Localidad</th>
                            <th>Proveedor Luz</th>   
                            <th>Proveedor Gas</th>                            
                            <th class="text-right">Acciones</th>                                
                        </tr>
                    </thead>
                    <tbody>
                        <tr>                                   
                            <td>Calle 12 495 3A</td>
                            <td>Depto</td>
                            <td>2</td>
                            <td>0 a 10 años</td>
                            <td>2</td>
                            <td>La Plata (1900)</td>
                            <td>Edelap</td>
                            <td>Camuzzi</td>
                            <td class="text-right">
                                <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>                                        
                                    <a href="#" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Arce 364</td>
                            <td>Depto</td>                                        
                            <td>4</td>
                            <td>10 a 50 años</td>
                            <td>3</td>
                            <td>CABA</td>
                            <td>Edenor</td>   
                            <td>Energas</td> 
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