<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
protected $fillable = [
        'name',
        'lang',
        'image',
        'year',
        'language',
        'pages',
        'category_id'
    ];
    use HasFactory;
    
}
