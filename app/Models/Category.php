<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        
    ];

    public function books(){
        return $this->hasMany(App\Models\Book::class,'category_id');
    }


    public function scopeRoot($query){
    $query->whereNull('category_id') ;
    }
    public function children (){
        return $this->hasMany (Category :: class,'category_id') ;
    }
    
}


