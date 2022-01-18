<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Factory as Faker;
use App\Models\BooksMongoDB;
use App\Models\BooksMariaDB;
use App\Models\BooksPostgres;
use App\Models\Estadistica;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller{    
    
    // Test Insert
    public function insert(Request $request)
    {
        if(!$request->test_value){
            return view('dashboard.test.insert');
        }
        $faker = Faker::create('es_AR');
        $tiempo_maria = 0;
        $tiempo_mongo = 0;
        $tiempo_postgres = 0;

        for ($i=1 ; $i <= $request->test_value; $i++){            
            // Faker del libro            
            $title = $faker->sentence(3);
            $author = $faker->name;
            $isbn = $faker->isbn13;
            $publisher = $faker->company;
            $year = $faker->year;

            // Insert into mariadb_books
            $book = new BooksMariaDB();
            $book->title = $title;
            $book->author = $author;
            $book->isbn = $isbn;
            $book->publisher = $publisher;
            $book->year = $year;
            // Guardo el libro y el tiempo que tarda en guardarlo
            $inicio = microtime(true);
            $book->save();
            $tiempo = microtime(true) - $inicio;
            $tiempo_maria =  $tiempo_maria + $tiempo;

            // Insert into mongodb_books
            $book = new BooksMongoDB();
            $book->title = $title;
            $book->author = $author;
            $book->isbn = $isbn;
            $book->publisher = $publisher;
            $book->year = $year;
            // Guardo el libro y el tiempo que tarda en guardarlo
            $inicio = microtime(true);            
            $book->save();
            $tiempo = microtime(true) - $inicio;
            $tiempo_mongo =  $tiempo_mongo + $tiempo;

            // Insert into postgres_books
            $book = new BooksPostgres();
            $book->title = $title;
            $book->author = $author;
            $book->isbn = $isbn;
            $book->publisher = $publisher;
            $book->year = $year;
            // Guardo el libro y el tiempo que tarda en guardarlo
            $inicio = microtime(true);
            $book->save();
            $tiempo = microtime(true) - $inicio;
            $tiempo_postgres =  $tiempo_postgres + $tiempo;
        }
        $test_cant = BooksMariaDB::count();
        $resultados = array(
            'test_tipo' => $request->test_tipo,
            'test_value' => $request->test_value,
            'test_cant' => $test_cant,
            'tiempo_maria' => $tiempo_maria,
            'tiempo_mongo' => $tiempo_mongo,
            'tiempo_postgres' => $tiempo_postgres
        );
        $this->guardarEstadistica($resultados);            
        return view('dashboard.test.insert')->with('resultados', $resultados);
    }

    // Test Select
    public function select(Request $request)
    {
        if(!$request->test_value){
            return view('dashboard.test.select');
        }
        $tiempo_maria = 0;
        $tiempo_mongo = 0;
        $tiempo_postgres = 0;
        switch ($request->test_tipo) {
            case 'where':
                // where mariadb
                $inicio = microtime(true);
                $books_maria = BooksMariaDB::where('year', $request->test_value)->get();
                $tiempo = microtime(true) - $inicio;
                $tiempo_maria =  $tiempo_maria + $tiempo;
                // where mongodb
                $inicio = microtime(true);                
                $books_mongo = BooksMongoDB::where('year', $request->test_value)->get();
                $tiempo = microtime(true) - $inicio;
                $tiempo_mongo =  $tiempo_mongo + $tiempo;
                // where postgres
                $inicio = microtime(true);
                $books_postgres = BooksPostgres::where('year', $request->test_value)->get();
                $tiempo = microtime(true) - $inicio;
                $tiempo_postgres =  $tiempo_postgres + $tiempo;                
            break;
            case 'like':
                // like mariadb
                $inicio = microtime(true);
                $books_maria = BooksMariaDB::where('title', 'LIKE', '%'.$request->test_value.'%')->get();
                $tiempo = microtime(true) - $inicio;
                $tiempo_maria =  $tiempo_maria + $tiempo;
                // like mongodb
                $inicio = microtime(true);
                $books_mongo = BooksMongoDB::where('title', 'LIKE', '%'.$request->test_value.'%')->get();
                $tiempo = microtime(true) - $inicio;
                $tiempo_mongo =  $tiempo_mongo + $tiempo;
                // like postgres
                $inicio = microtime(true);
                $books_postgres = BooksPostgres::where('title', 'LIKE', '%'.$request->test_value.'%')->get();
                $tiempo = microtime(true) - $inicio;
                $tiempo_postgres =  $tiempo_postgres + $tiempo;
            break;            
        }
        $test_cant = BooksMariaDB::count();
        $rows_afectados = $books_maria->count();
        $resultados = array(
            'test_tipo' => $request->test_tipo,
            'test_value' => $rows_afectados,
            'test_cant' => $test_cant,
            'tiempo_maria' => $tiempo_maria,
            'tiempo_mongo' => $tiempo_mongo,
            'tiempo_postgres' => $tiempo_postgres
        );
        $this->guardarEstadistica($resultados);
        return view('dashboard.test.select')->with('resultados', $resultados);
    }

    // Test Delete
    public function delete(Request $request)
    {   
        if(!$request->test_tipo){
            return view('dashboard.test.delete');
        }        
        $tiempo_maria = 0;
        $tiempo_mongo = 0;
        $tiempo_postgres = 0;        
        // delete mariadb        
        $books_maria = BooksMariaDB::all();
        $test_cant = $books_maria->count();
        $inicio = microtime(true);
        $books_maria->each(function($book) {
            $book->delete();
        });
        $tiempo = microtime(true) - $inicio;
        $tiempo_maria =  $tiempo_maria + $tiempo;
        // delete mongodb
        $inicio = microtime(true);
        $books_mongo = BooksMongoDB::all();
        $books_mongo->each(function($book) {
            $book->delete();
        });
        $tiempo = microtime(true) - $inicio;
        $tiempo_mongo =  $tiempo_mongo + $tiempo;
        // delete postgres
        $inicio = microtime(true);
        $books_postgres = BooksPostgres::all();
        $books_postgres->each(function($book) {
            $book->delete();
        });
        $tiempo = microtime(true) - $inicio;
        $tiempo_postgres =  $tiempo_postgres + $tiempo;
        
        $resultados = array(
            'test_tipo' => $request->test_tipo,
            'test_value' => $test_cant,
            'test_cant' => $test_cant,
            'tiempo_maria' => $tiempo_maria,
            'tiempo_mongo' => $tiempo_mongo,
            'tiempo_postgres' => $tiempo_postgres
        );
        $this->guardarEstadistica($resultados);
        return view('dashboard.test.delete')->with('resultados', $resultados); 
    }  
    
    // Test Update
    public function update(Request $request)
    {
        if(!$request->test_tipo){
            return view('dashboard.test.update');
        }
        $tiempo_maria = 0;
        $tiempo_mongo = 0;
        $tiempo_postgres = 0;
        
        // update mariadb
        $test_cant = BooksMariaDB::count();
        $books_maria = BooksMariaDB::where('year', $request->test_value)->get();  
        foreach ($books_maria as $book) {
            $book->title = $book->title . ' - ' . $book->year;
            $inicio = microtime(true);
            $book->save();
            $tiempo = microtime(true) - $inicio;
            $tiempo_maria =  $tiempo_maria + $tiempo;
        }
        // update mongodb
        $books_mongo = BooksMongoDB::where('year', $request->test_value)->get();
        foreach ($books_mongo as $book) {
            $book->title = $book->title . ' - ' . $book->year;
            $inicio = microtime(true);
            $book->save();
            $tiempo = microtime(true) - $inicio;
            $tiempo_mongo =  $tiempo_mongo + $tiempo;
        }
        // update postgres
        $books_postgres = BooksPostgres::where('year', $request->test_value)->get();
        foreach ($books_postgres as $book) {
            $book->title = $book->title . ' - ' . $book->year;
            $inicio = microtime(true);
            $book->save();
            $tiempo = microtime(true) - $inicio;
            $tiempo_postgres =  $tiempo_postgres + $tiempo;
        }

        $resultados = array(
            'test_tipo' => $request->test_tipo,
            'test_value' => $books_maria->count(),
            'test_cant' => $test_cant,
            'tiempo_maria' => $tiempo_maria,
            'tiempo_mongo' => $tiempo_mongo,
            'tiempo_postgres' => $tiempo_postgres
        );
        $this->guardarEstadistica($resultados);
        return view('dashboard.test.update')->with('resultados', $resultados);
    }   
          
    // Test Blob
    public function blob(Request $request)
    {
        if(!$request->test_tipo){
            return view('dashboard.test.blob');
        }
        $tiempo_maria = 0;
        $tiempo_mongo = 0;
        $tiempo_postgres = 0;

        // Obtengo el binario de storage
        $blob = Storage::get('public/ebook.txt');
        
        
        // blob mariadb
        $test_cant = BooksMariaDB::all()->count();
        $books_maria = BooksMariaDB::all();  
        foreach ($books_maria as $book) {
            $book->ebook = $blob;            
            $inicio = microtime(true);
            $book->save();
            $tiempo = microtime(true) - $inicio;
            $tiempo_maria =  $tiempo_maria + $tiempo;
        }
        // blob mongodb
        $books_mongo = BooksMongoDB::all();
        foreach ($books_mongo as $book) {
            $book->ebook = $blob;
            $inicio = microtime(true);
            $book->save();
            $tiempo = microtime(true) - $inicio;
            $tiempo_mongo =  $tiempo_mongo + $tiempo;
        }
        // blob postgres
        $books_postgres = BooksPostgres::all();
        foreach ($books_postgres as $book) {
            $book->ebook = $blob;
            $inicio = microtime(true);
            $book->save();
            $tiempo = microtime(true) - $inicio;
            $tiempo_postgres =  $tiempo_postgres + $tiempo;
        }        
        $resultados = array(
            'test_tipo' => $request->test_tipo,
            'test_value' => $test_cant,
            'test_cant' => $test_cant,
            'tiempo_maria' => $tiempo_maria,
            'tiempo_mongo' => $tiempo_mongo,
            'tiempo_postgres' => $tiempo_postgres
        );
        $this->guardarEstadistica($resultados);
        return view('dashboard.test.blob')->with('resultados', $resultados);
    }
    
    // Guarda Estadisticas
    public function guardarEstadistica($resultado)
    {
        $estadistica = new Estadistica();
        $estadistica->test_tipo = $resultado['test_tipo'];
        $estadistica->test_value = $resultado['test_value'];
        $estadistica->test_cant = $resultado['test_cant'];
        $estadistica->tiempo_maria = $resultado['tiempo_maria'];
        $estadistica->tiempo_mongo = $resultado['tiempo_mongo'];
        $estadistica->tiempo_postgres = $resultado['tiempo_postgres'];
        $estadistica->save();
    }

}
