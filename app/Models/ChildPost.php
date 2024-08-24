<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChildPost extends Post
{
    use HasFactory;

    protected $table = 'posts';
    protected $translationForeignKey = 'post_id';
}
