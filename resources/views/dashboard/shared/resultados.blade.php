<div class="row">               
    <div class="col-sm-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4><i class="fas fa-chart-line"></i> Resultados</h4>
            </div>
            <div class="card-body">
                <p>
                    Tipo de Test: {{$resultados['test_tipo']}}
                </p>
                <p>
                    Registros Actuales: {{$resultados['test_cant']}}
                </p>
                <p>
                    Registros Afectados: {{$resultados['test_value']}}
                </p>
                <p>
                    Tiempo de la base de datos <b>MariaDB</b>: {{$resultados['tiempo_maria']}} segundos.
                </p>
                <p>
                    Tiempo de la base de datos <b>PostgreSQL</b>: {{$resultados['tiempo_postgres']}} segundos.
                </p>
                <p>
                    Tiempo de la base de datos <b>MongoDB</b>: {{$resultados['tiempo_mongo']}} segundos.
                </p>
            </div>
        </div>
    </div>
</div>