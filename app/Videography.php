<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videography extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
