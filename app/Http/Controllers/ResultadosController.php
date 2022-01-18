<?php

namespace App\Http\Controllers;

use App\Models\Estadistica;

use Illuminate\Http\Request;

class ResultadosController extends Controller
{
    //index listar resultados en tabla
    public function index()
    {
        $resultados = Estadistica::all();
        return view('dashboard.resultados.index')->with('resultados', $resultados);
    }
}
