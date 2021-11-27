@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            
            <!-- Tabla -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h4><i class="fas fa-bolt"></i> Consumos Totales</h4></div>
                        <div class="card-body">
                            <p>
                                Resultados mensuales de la simulacion electrica de todos tus artefactos.
                            </p>
                            
                           

                            <table class="table table-striped table-sm datatable mt-3">                                
                                <thead>
                                    <tr>                                    
                                        <th>Artefacto</th>
                                        <th>Categoría</th>                                        
                                        <th>Energia</th>
                                        <th class="text-right">Consumo Mes</th>             
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>                                   
                                        <td>Lampara LED 5W</td>
                                        <td>Iluminación</td>
                                        <td>Electrica</td>
                                        <td class="text-right">0.9 kW/h</td> 
                                    </tr>
                                    <tr>
                                        <td>TV LED 50 pulgadas</td>
                                        <td>Electronica</td>
                                        <td>Electrica</td>
                                        <td class="text-right">25.5 kW/h</td>                                       
                                        
                                    </tr>
                                    <tr>
                                        <td>Heladera</td>
                                        <td>Linea Blanca</td>
                                        <td>Electrica</td>
                                        <td class="text-right">180 kW/h</td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right text-danger text-bold">206.4 kW/h</td>
                                    </tr>
                                </tbody>
                            </table>
                
                        </div>
                </div>
            </div>

            <!-- Chart -->
            <div class="col-sm-6 col-md-2">
                <div class="card text-white bg-danger">
                  <div class="card-body">
                    <div class="text-muted text-right mb-4">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <div class="text-value-lg">206.4</div><small class="text-muted text-uppercase font-weight-bold">Consumo Total</small>
                    <div class="progress progress-white progress-xs mt-3">
                      <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>

        </div>
    </div>
</div>


@endsection

