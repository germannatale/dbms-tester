<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadistica extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table = 'estadisticas';
    
    protected $fillable = [
        'test_tipo', 'test_value', 'test_cant', 'tiempo_maria', 'tiempo_mongo', 'tiempo_postgres',
    ];
}
