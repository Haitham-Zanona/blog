<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $category->load(['translations', 'children.translations']);
        $posts = Post::where('category_id', $category->id)
            ->with('translations')
            ->paginate(15);

        return view('website.category', compact('category', 'posts'));
    }
}