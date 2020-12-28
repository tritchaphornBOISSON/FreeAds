<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'Title', 
        'Description', 
        'image',
        'Category',
        'Price',
        'Location',
        'User_id',
       ];

       public function user()
       {
           return $this->belongsTo('App\User');
       }
   
}
