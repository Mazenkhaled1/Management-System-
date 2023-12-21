<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artical extends Model
{
    use HasFactory;

    // single user has many artial
    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'name',
        'image',
        'title', 
        'desription',
    ] ;
}