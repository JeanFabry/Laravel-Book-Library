<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable= [
        'title',
        'author',
        'genre',
        'quantity',
        'publisher',
        'id',
    ];

    function rents()
    {
        return $this->hasMany(Rent::class);
    }
}
