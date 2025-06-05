<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    protected $fillable = ['name', 'email', 'password'];

    public function reviews(){
        return $this->hasMany(Review::class, 'client_id', 'id');
    }
}