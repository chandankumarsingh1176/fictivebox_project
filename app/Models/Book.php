<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'book_name',
        'book_author',
        'book_pic',
        'rating',
        'category',
    ];
    public function ratings()
    {
        return $this->hasMany(BookRating::class, 'book_id');
    }
}
