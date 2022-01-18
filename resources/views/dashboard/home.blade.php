@extends('dashboard.base')

@section('content')

<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">Bienvenido</div>
            <div class="card-body">
                <h1>DBMS Tester</h1>
                <h4>Software de testeo para motores de Bases de Datos</h4>
                <p>
                    El proyecto surgio como parte del TP final de la materia Administracion de Bases de Datos de la carrera Ingenieria 
                    en Sistemas de Información de la Universidad Tecnológica Nancional Regional La Plata. La idea fue crear 
                    Un proyecto dockerizado que permitiera testear distintos motores de bases de datos. Estableciendo como 
                    premisas que los motores de bases de datos deben ser capaces de manejar una serie de operaciones basicas y 
                    devolver resultados de rendimientos para compararlos entre ellos.
                    Los motores implementados con la configuración actual son: PostgreSQL, MongoDB, MariaDB.
                    
                </p>
                <h4>Como operar?</h4>
                <p>
                    Si puede leer este texto todo esta listo para realizar las pruebas preestablecidas. Puede modificar o crear nuevas pruebas 
                    desde el código. Se recomienda hacerlos en el orden preestablecido en el menu partiendo de un numero de operaciones insert (ej: 1.000) y luego
                    seguir con el resto de los test. Al terminar puede consultar las estadisticas de rendimiento de cada motor de base de datos para ese numero de 
                    operaciones. Las mismas promedian los tiempos para cada test obtenidos. Es decir si hace mas de una prueba se promedia el tiempo de cada una 
                    para cada motor. 
                    Desde restaurar puede borrar todos los datos y comenzar de vuelta con otra cantidad de inserts (ej: 10.000) para ver si el comportamiento es similar.
                </p>
                <ul>
                    <li>1. Elija una prueba</li>
                    <li>2. Establezca la dificultad si es el caso</li>
                    <li>3. Ejecutela (correra en los tres motores mencionados)</li>
                    <li>4. Obtenga Resultados</li>
                    <li>5. Continue con el siguiente test.</li>
                    <li>6. Consulte las estadisticas.</li>
                </ul>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection