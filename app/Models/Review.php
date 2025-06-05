<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = ['note', 'text', 'client_id', 'book_id'];

    public function client(){
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function book(){
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}
