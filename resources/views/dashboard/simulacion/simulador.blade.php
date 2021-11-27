@extends('dashboard.base')

@section('content')

<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4><i class="fas fa-bolt"></i> Simulador</h4></div>
            <div class="card-body">
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur maiores eius neque laudantium tempora? 
                    Atque cupiditate consectetur a nihil sapiente nisi dolor perspiciatis! Ipsam, labore. Minima unde ex possimus. 
                    Odit.Voluptates voluptatum modi necessitatibus inventore.
                </p>

                <a href="{{route('simulador.resultados')}}" class="btn btn-primary mb-3"><i class="fas fa-bolt"></i> Simular Consumo</a>
                
                <div id="accordion">
                    <div class="card mb-0">
                        <div class="card-header" id="headingOne">
                        <h5 class="card-title mb-0">
                        <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <strong><i class="fas fa-chevron-down"></i> Dormitorio Principal</strong>                            
                        </a>                        
                        </h5>
                        </div>                  
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <button class="btn btn-secondary"><i class="fas fa-plus"></i> Agregar Artefacto</button>
                            <table class="table table-striped table-sm datatable mt-3">                                
                                <thead>
                                    <tr>
                                        <th>Cantidad</th>
                                        <th>Artefacto</th>                                        
                                        <th>Energia</th>
                                        <th>Consumo</th>                                        
                                        <th class="text-right">Acciones</th>                                
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>6</td>
                                        <td>Lampara LED 5W</td>
                                        <td>Electrica</td>
                                        <td>5W</td>
                                        <td class="text-right">
                                            <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></a>
                                                <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>                                        
                                                <a href="#" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                  <tr>
                                    <td>1</td>
                                    <td>TV LED 50 pulgadas</td>
                                    <td>Electrica</td>
                                    <td>85 W/h</td>
                                    <td class="text-right">
                                        <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>                                        
                                            <a href="#" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>1</td>
                                    <td>Estufa Tiro Balanceado 4500 calorias</td>
                                    <td>Gas</td>
                                    <td>0.48 m3/h</td>
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
                    <div class="card mb-0">
                        <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <a class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <strong><i class="fas fa-chevron-down"></i> Dormitorio Secundario</strong>
                            </a>
                            
                        </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                        </div>
                    </div>
                    <div class="card mb-0">
                        <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <a class="btn btn-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <strong><i class="fas fa-chevron-down"></i> Living</strong>
                            </a>
                        </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                        </div>
                    </div>                  
                    <div class="card mb-0">
                        <div class="card-header" id="heading4">
                        <h5 class="mb-0">
                            <a class="btn btn-link" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
                                <strong><i class="fas fa-chevron-down"></i> Cocina</strong>
                            </a>
                        </h5>
                        </div>                  
                        <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                        </div>
                    </div>
                    <div class="card mb-0">
                        <div class="card-header" id="heading5">
                        <h5 class="mb-0">
                            <a class="btn btn-link" data-toggle="collapse" data-target="#collapse5" aria-expanded="true" aria-controls="collapse5">
                                <strong><i class="fas fa-chevron-down"></i> Baño</strong>
                            </a>
                        </h5>
                        </div>                  
                        <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordion">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                        </div>
                    </div>
                    <div class="card mb-0">
                        <div class="card-header" id="heading6">
                        <h5 class="mb-0">
                            <a class="btn btn-link" data-toggle="collapse" data-target="#collapse6" aria-expanded="true" aria-controls="collapse6">
                            <strong><i class="fas fa-chevron-down"></i> Cochera</strong>
                            </a>
                        </h5>
                        </div>                  
                        <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordion">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                        </div>
                    </div>
                    <div class="card mb-0">
                        <div class="card-header" id="heading7">
                        <h5 class="mb-0">
                            <a class="btn btn-link" data-toggle="collapse" data-target="#collapse7" aria-expanded="true" aria-controls="collapse7">
                                <strong><i class="fas fa-chevron-down"></i> Patio</strong>
                            </a>
                        </h5>
                        </div>                  
                        <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordion">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection