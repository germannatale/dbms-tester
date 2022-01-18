<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estadistica;
use Illuminate\Support\Facades\DB;

class EstadisticaController extends Controller
{
    public function promedio()
    {
        $estadisticas = $this->getEstadisticas('promedio');
        return view('dashboard.estadisticas.vs_promedio')->with('estadisticas', $estadisticas);
    }

    public function curvas()
    {
        $estadisticas = $this->getEstadisticas('curvas');
        return view('dashboard.estadisticas.vs_curvas')->with('estadisticas', $estadisticas);
    }

    public function motor($motor)
    {
        $data = $this->getEstadisticas($motor);        
        return view('dashboard.estadisticas.motor')->with('estadisticas', $data);
    }

    public function getEstadisticas($motor){
        if ($motor == 'promedio'){
            $estadisticas = Estadistica::groupBy('test_tipo')                        
                ->selectRaw('test_tipo ,avg(tiempo_maria) as tiempo_maria, avg(tiempo_mongo) as tiempo_mongo, avg(tiempo_postgres) as tiempo_postgres')
                ->get();
            return $estadisticas;
        }

        $estadisticas = Estadistica::groupBy('test_tipo', 'test_cant')                      
            ->selectRaw('test_tipo, test_cant, avg(tiempo_maria) as tiempo_maria, avg(tiempo_mongo) as tiempo_mongo, avg(tiempo_postgres) as tiempo_postgres')
            ->orderBy('test_cant')
            ->get();

        // Quito las comillas que suma la consulta a los tiempos por alguna razón
        $estadisticas->each(function($estadistica) {
            $estadistica->tiempo_maria = floatval($estadistica->tiempo_maria);
            $estadistica->tiempo_mongo = floatval($estadistica->tiempo_mongo);
            $estadistica->tiempo_postgres = floatval($estadistica->tiempo_postgres);
        });

        $tests = collect([
            'insert' => $estadisticas->where('test_tipo', 'insert'),
            'where' => $estadisticas->where('test_tipo', 'where'),
            'like' => $estadisticas->where('test_tipo', 'like'),
            'update' => $estadisticas->where('test_tipo', 'update'),
            'blob' => $estadisticas->where('test_tipo', 'blob'),
            'delete' => $estadisticas->where('test_tipo', 'delete'),
        ]);
        
        $data = collect();
        foreach ($tests as $test){
            if($test->count() > 0){
                switch ($motor) {
                    case 'mariadb':
                        $data->push([
                            'test' => $test->first()->test_tipo,
                            'cant' => $test->pluck('test_cant'),
                            'motor' => 'MariaDB',
                            'tiempo' => $test->pluck('tiempo_maria')                            
                        ]);
                        break;
                    case 'mongodb':
                        $data->push([
                            'test' => $test->first()->test_tipo,
                            'cant' => $test->pluck('test_cant'),
                            'motor' => 'MongoDB',
                            'tiempo' => $test->pluck('tiempo_mongo')
                        ]);
                        break;
                    case 'postgresql':
                        $data->push([
                            'test' => $test->first()->test_tipo,
                            'cant' => $test->pluck('test_cant'),
                            'motor' => 'PostgreSQL',
                            'tiempo' => $test->pluck('tiempo_postgres')
                        ]);
                        break;
                    case 'curvas':
                        $data->push([
                            'test' => $test->first()->test_tipo,
                            'cant' => $test->pluck('test_cant'),
                            'mariadb' => $test->pluck('tiempo_maria'),
                            'mongodb' => $test->pluck('tiempo_mongo'),                           
                            'postgres' => $test->pluck('tiempo_postgres')
                        ]);
                        break;                                                       
                }                
            }
        }
        return $data;
    }

    public function resultados()
    {
        $resultados = Estadistica::all();
        return view('dashboard.estadisticas.resultados')->with('resultados', $resultados);
    }
    
    public function restaurar(){       
        return view('dashboard.estadisticas.restaurar');
    }

    public function destroy(){
        // Borrar Estdisticas
        DB::connection('mysql')->table('estadisticas')->truncate();
        
        // Borrar Books
        DB::connection('mysql')->table('mariadb_books')->truncate();    
        DB::connection('mongodb')->table('mongo_books')->truncate();    
        DB::connection('pgsql')->table('postgres_books')->truncate();
       
        return redirect()->route('estadisticas.restaurar')->withExito('Se han eliminado todos los registros de las bases de datos');
    }
}
