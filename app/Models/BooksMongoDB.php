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
