<?php

namespace App\Models;

use App\Models\Author;
use Illuminate\Database\Eloquent\Model;
use App\Models\book_author;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    protected $fillable = [
        'title',
        'description',
        'edition',
        'publication',
        
    ];
   
    use HasFactory;
    public function authors()
    {
        return $this->belongsToMany(Author::class,'book_author');//book_author is the table name
    }
}
