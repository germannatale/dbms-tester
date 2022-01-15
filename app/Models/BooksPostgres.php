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

    public function setEbookAttribute($value)
    {
        // guardo el blob como base64
        $this->attributes['ebook'] = base64_encode($value);
    }

    public function getEbookAttribute($value)
    {
        // devuelvo el blob
        return base64_decode($value);
    }
}
