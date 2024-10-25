<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['title', 'content', 'slug'];

    /* public function getTitleAttribute()
    {
        return $this->title;
    } */

}
