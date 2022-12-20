<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;
    protected $fillable = ['genre', 'published', 'bookSold', 'authorsId'];

    function authors(){
        return $this->hasMany('App\Models\Author');
    }
}
