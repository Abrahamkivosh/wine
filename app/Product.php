<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
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
