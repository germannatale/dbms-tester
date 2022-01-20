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
                  Los tres motores poseen una tabla books (title, isbn, author, year, ebook) sobre la cual se haran los test. 
                  Se recomienda hacer los test en el orden preestablecido en el menu partiendo de un numero de operaciones INSERT (ej: 1.000) 
                  y luego seguir con el resto de los tests. El ultimo test DELETE vacía la tabla de pruebas por lo que puede comenzar nuevamente 
                  desde el principio con otra cantidad de registros (ej 10.000). En cualquier momento puede consultar las estadísticas de 
                  rendimiento de cada motor para ese numero de operaciones. Las mismas promedian los tiempos para cada test obtenidos. 
                  Es decir si hace mas de una prueba para la misma cantidad de registros se promedia el tiempo de cada test para cada motor. 
                  Lo recomendable es hacer unas 5 vueltas completas para obtener resultados suficientes (ej: 1000, 2000, 4000, 8000, 16000). 
                  Puede modificar o crear nuevas pruebas desde el código. 
                </p>
                <ul>
                  <li>1. Comience con un test INSERT</li>
                  <li>2. Establezca la dificultad (1.000 , 10.000, etc)</li>
                  <li>3. Ejecútelo (correrá en los tres motores mencionados)</li>
                  <li>4. Obtenga Resultados</li>
                  <li>5. Continúe con el siguiente test.</li>
                  <li>6. Finalizado el test DELETE vuelva a INSERT con una nueva dificultad.</li>
                  <li>7. Consulte las estadísticas (Se recomienda hacer 5 vueltas).</li>
                </ul>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection