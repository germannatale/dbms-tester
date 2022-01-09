<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BooksPostgres extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';

    protected $table = 'postgres_books';

    protected $fillable = [
        'title', 'author', 'isbn', 'publisher', 'year', 'ebook',
    ];
}
