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

    public function setEbookAttribute($value)
    {
        // guardo el blob como base64
        //$this->ebook = base64_encode($value); //no funciona
        $this->attributes['ebook'] = base64_encode($value);
    }

    public function getEbookAttribute($value)
    {
        // devuelvo el blob
        return base64_decode($value);
    }

}
