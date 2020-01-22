<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $guarded = [];

   public static function gallery()
   {
       return $this->hasMany(Gallery::class);
   }

   public function blog()
   {
       return $this->hasMany(Blog::class);
   }

   public function videography()
   {
       return $this->hasMany(Videography::class);
   }
}
