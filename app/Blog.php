<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];

    protected $fillable = ['title','category_id','date','image','description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
