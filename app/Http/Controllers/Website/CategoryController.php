<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $category = $category->load('children');
        // dd($category);
        $posts = Post::where('category_id', $category->id)->paginate(15);

        return view('website.category', compact('category', 'posts'));
    }
}