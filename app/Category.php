<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $gurded = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
