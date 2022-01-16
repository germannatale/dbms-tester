<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estadistica;

class PanelController extends Controller
{
    public function index()
    {
        return view('dashboard.panel.charts');
    }

    public function testResultado(Request $request)
    {
        $test = $request->test;        
        $estadisticas = Estadistica::where('test_tipo', $test)->get();
        return $estadisticas;
    }

    public function resultados(Request $request)
    {
        $estadisticas = Estadistica::groupBy('test_tipo')
            ->selectRaw('test_tipo ,avg(tiempo_maria) as tiempo_maria, avg(tiempo_mongo) as tiempo_mongo, avg(tiempo_postgres) as tiempo_postgres')
            ->get();
            //selectRaw promedio de tiempo de cada test
            //->selectRaw('test_cant, test_tipo ,avg(tiempo_maria) as tiempo_maria, avg(tiempo_mongo) as tiempo_mongo, avg(tiempo_postgres) as tiempo_postgres')
            //->get();
            $data = [
                'tests' => $estadisticas->pluck('test_tipo'),
                'maria' => $estadisticas->pluck('tiempo_maria'),
                'mongo' => $estadisticas->pluck('tiempo_mongo'),
                'postgres' => $estadisticas->pluck('tiempo_postgres'),               
            ];
        return $data;
    }
}
