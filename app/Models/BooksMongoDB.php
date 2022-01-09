<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model; //importante para usar el modelo de mongodb

class BooksMongoDB extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = 'mongo_books';

    protected $fillable = [
        'title', 'author', 'isbn', 'publisher', 'year', 'ebook',
    ];
}
