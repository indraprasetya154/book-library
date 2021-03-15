<?php

namespace App\Models;

use App\Models\Models\BookCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'books';

    protected $fillable = ['name'];

    public function bookCategories()
    {
        return $this->belongsToMany(BookCategory::class, 'category_id');
    }
}
