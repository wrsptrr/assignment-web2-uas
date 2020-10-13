<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
