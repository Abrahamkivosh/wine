<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $gurded= [];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
     public function supplier()
    {
        # code...
        return $this->belongsTo(Supplier::class) ;
    }

}
