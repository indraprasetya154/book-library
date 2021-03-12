<?php

namespace App\Models;

use App\Http\Requests\BookRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'books';

    protected $fillable = ['title', 'description', 'release_year', 'author_id'];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function bookCategories()
    {
        return $this->belongsToMany(BookRequest::class, 'book_id');
    }
}
