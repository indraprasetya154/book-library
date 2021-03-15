<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'authors';

    protected $fillable = ['name', 'place_of_birth', 'date_of_birth', 'phone_number', 'address', 'biography'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
