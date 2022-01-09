<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Factory as Faker;
use App\Models\BooksMongoDB;
use App\Models\BooksMariaDB;
use App\Models\BooksPostgres;


class TestController extends Controller{
    
    // Test Insert
    public function insert(Request $request)
    {
        if(!$request->test_value){
            return view('dashboard.test.insert');
        }
        $faker = Faker::create();
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
        $resultados = array(
            'test_tipo' => $request->test_tipo,
            'test_value' => $request->test_value,
            'test_cant' => $request->test_value,
            'tiempo_maria' => $tiempo_maria,
            'tiempo_mongo' => $tiempo_mongo,
            'tiempo_postgres' => $tiempo_postgres
        );            
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
        $test_cant = $books_maria->count();
        $resultados = array(
            'test_tipo' => $request->test_tipo,
            'test_value' => $request->test_value,
            'test_cant' => $test_cant,
            'tiempo_maria' => $tiempo_maria,
            'tiempo_mongo' => $tiempo_mongo,
            'tiempo_postgres' => $tiempo_postgres
        );
        return view('dashboard.test.select')->with('resultados', $resultados);
    }
}
