<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
protected $fillable = [
        'name',
        'language',
        'image',
        'year',
        'writer',
        'language',
        'pages',
        'category_id'
    ];
    use HasFactory;
    
}
