<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use App\Models\book_author_relationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'DOB',
        
    ];
   /* public function books()
    {
        return  this->belongsToMany(Book::class);
    }*/
}
