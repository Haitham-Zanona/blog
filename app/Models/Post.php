<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class Post extends Model implements TranslatableContract
{
    use HasFactory, Translatable, SoftDeletes, HasEagerLimit;

    public $translatedAttributes = ['title', 'content', 'smallDesc', 'tags'];
    protected $fillable = ['id', 'image', 'category_id', 'title', 'content', 'created_at', 'updated_at', 'deleted_at', 'user_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}