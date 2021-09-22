<?php

// Post.php created by command "php artisan make:model Post"

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   public function postDetail() {
       return $this->belongsTo(PostDetail::class);
   }
}
