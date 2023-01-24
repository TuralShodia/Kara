<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'book_id',
        'promocode'
    ];
    use HasFactory;
    // public function books(){
    //     return $this->belongsToMany(Book::class);
    // }
}
