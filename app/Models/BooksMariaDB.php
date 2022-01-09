<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BooksMariaDB extends Model
{
    // use HasFactory;

    protected $connection = 'mysql';

    protected $table = 'mariadb_books';

    protected $fillable = [
        'title', 'author', 'isbn', 'publisher', 'year', 'ebook',
    ];


}
