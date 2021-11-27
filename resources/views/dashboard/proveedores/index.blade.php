@extends('dashboard.base')

@section('content')

<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4><i class="fas fa-building"></i> Proveedores Energia</h4></div>
            <div class="card-body">
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur maiores eius neque laudantium tempora? 
                    Atque cupiditate consectetur a nihil sapiente nisi dolor perspiciatis! Ipsam, labore. Minima unde ex possimus. 
                    Odit.Voluptates voluptatum modi necessitatibus inventore.
                </p>
                
                <button class="btn btn-success"><i class="fas fa-plus"></i> Nuevo Proveedor</button>

                <table class="table table-striped table-sm datatable mt-3">                                
                    <thead>
                        <tr>                                    
                            <th>Nombre</th>
                            <th>Energia</th>                                        
                            <th>Domicilio</th>
                            <th>CUIT</th>
                            <th>email</th>
                            <th>Localidad</th>                              
                            <th class="text-right">Acciones</th>                                
                        </tr>
                    </thead>
                    <tbody>
                        <tr>                                   
                            <td>Edelap</td>
                            <td>Electrica</td>
                            <td>Diag 80 esq 5</td>
                            <td>30-55555555-5</td>
                            <td>info@edelap.com.ar</td>
                            <td>La Plata</td>
                            <td class="text-right">
                                <a href="#" class="btn btn-sm btn-success"><i class="fas fa-plus" data-toggle="tooltip" data-placement="top" title="Nuevo Cuadro Tarifario"></i></a>
                                <a href="{{route('proveedores.cuadro-tarifario')}}" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="Ver Cuadro Tarifario"><i class="fas fa-dollar-sign"></i></a>                               
                                <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>                                        
                                <a href="#" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Comuzzi</td>
                            <td>Gas</td>
                            <td>126 esq 50</td>
                            <td>30-66666666-5</td>
                            <td>info@camuzzi.com.ar</td>
                            <td>La Plata</td>
                            <td class="text-right">
                                <a href="#" class="btn btn-sm btn-success"><i class="fas fa-plus" data-toggle="tooltip" data-placement="top" title="Nuevo Cuadro Tarifario"></i></a>
                                <a href="#" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="Ver Cuadro Tarifario"><i class="fas fa-dollar-sign"></i></a> 
                                <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>                                        
                                <a href="#" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Metrogas</td>
                            <td>Gas</td>
                            <td>Urquiza 540</td>
                            <td>30-44444444-5</td>
                            <td>info@metrogas.com.ar</td>
                            <td>Martinez</td>
                            <td class="text-right">
                                <a href="#" class="btn btn-sm btn-success"><i class="fas fa-plus" data-toggle="tooltip" data-placement="top" title="Nuevo Cuadro Tarifario"></i></a>
                                <a href="#" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="Ver Cuadro Tarifario"><i class="fas fa-dollar-sign"></i></a> 
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