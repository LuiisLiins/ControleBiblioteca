<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['title', 'sinopse', 'gender_id', 'author_id'];

    public function gender(){
        return $this->belongsTo(Gender::class, 'gender_id', 'id');
    }

    public function author(){
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }

    public function reviews(){
        return $this->hasMany(Review::class, 'book_id', 'id');
    }
}
