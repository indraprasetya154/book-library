<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class BookCategory extends Pivot
{
    use HasFactory;

    protected $table = 'book_categories';

    protected $fillable = ['book_id', 'category_id'];


}
