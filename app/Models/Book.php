<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'ean',
        'image_url',
        'author'
    ];

    public function borrowedFrom()
    {
        return $this->belongsToMany(User::class, 'books_users');
    }
}
