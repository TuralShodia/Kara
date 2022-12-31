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
        'pages',
        'description',
        'category_id'
    ];
    use HasFactory;
    public function category(){
        return $this->belongsTo(\App\Models\Category::class,'category_id');
    }
}
