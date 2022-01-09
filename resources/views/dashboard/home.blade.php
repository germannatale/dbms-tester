@extends('dashboard.base')

@section('content')

<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">Bienvenido</div>
            <div class="card-body">
                <h1>Tester DBMS</h1>
                <h4>Software de testeo para motores de Bases de Datos</h4>
                <p>
                    El proyecto surgio como parte del TP final de la materia Administracion de Bases de Datos de la carrera Ingenieria 
                    en Sistemas de Información de la Universidad Tecnológica Nancional Regional La Plata. La idea fue crear 
                    Un proyecto dockerizado que permitiera testear distintos motores de bases de datos. Estableciendo como 
                    premisas que los motores de bases de datos deben ser capaces de manejar una serie de operaciones basicas y 
                    devolver resultados de rendimientos para compararlos entre ellos.
                    Los motores de bases de datos que se pueden testear con la configuración actual son: PostgreSQL, MongoDB, MariaDB.
                    
                </p>
                <h4>Como operar?</h4>
                <p>
                    Si puede leer este texto todo esta listo para realizar las pruebas preestablecidas. Puede modificar o crear nuevas pruebas 
                    desde el código.
                </p>
                <ul>
                    <li>1. Elija una prueba</li>
                    <li>2. Establezca la dificultad</li>
                    <li>3. Ejecutela (correra en los tres motores mencionados)</li>
                    <li>4. Obtenga Resultados</li>                    
                </ul>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection