@extends('dashboard.base')

@section('content')

<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4><i class="fas fa-dollar-sign"></i> Cuadro Tarifario: Edelap</h4></div>
            <div class="card-body">
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur maiores eius neque laudantium tempora? 
                    Atque cupiditate consectetur a nihil sapiente nisi dolor perspiciatis! Ipsam, labore. Minima unde ex possimus. 
                    Odit.Voluptates voluptatum modi necessitatibus inventore.
                </p>
                
                <button class="btn btn-success"><i class="fas fa-plus"></i> Nueva Tarifa</button>

                <table class="table table-striped table-sm datatable mt-3">                                
                    <thead>
                        <tr>                                    
                            <th>Categoria</th>
                            <th>Fecha Inicio</th>                                        
                            <th>Fecha Fin</th> 
                            <th>Cons Min</th>
                            <th>Cons Max</th>
                            <th>Precio Fijo</th>
                            <th>Precio Variable</th>
                            <th class="text-right">Acciones</th>                                
                        </tr>
                    </thead>
                    <tbody>
                        <tr>                                   
                            <td>Residencial T1 R1</td>
                            <td>01/01/2020</td>
                            <td>Vigente</td>
                            <td>0 kW/h</td>
                            <td>150 kW/h</td>
                            <td>$95.85</td>
                            <td>$3.41 kW/h</td>
                            <td class="text-right">                                                               
                                <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>                       
                        <tr>
                            <td>Residencial T1 R2</td>
                            <td>01/01/2020</td>
                            <td>Vigente</td>
                            <td>150 kW/h</td>
                            <td>325 kW/h</td>
                            <td>$265.22</td>
                            <td>$3.17 kW/h</td>
                            <td class="text-right">                                                               
                                <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                        <td>Residencial T1 R2</td>
                            <td>01/01/2020</td>
                            <td>Vigente</td>
                            <td>500 kW/h</td>
                            <td>600 kW/h</td>
                            <td>$799.61</td>
                            <td>$3.64 kW/h</td>
                            <td class="text-right">                                                               
                                <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>
                            </td>
                    </tbody>
                </table>
                
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection