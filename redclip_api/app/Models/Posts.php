<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = ['id_post', 'title', 'content', 'image_url', 'like', 'dislike'];  
}
