<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class IndexController extends Controller
{
    public function index()
    {
        $post = Post::all();
        $category = Category::all();
        $categories_with_posts = Category::with(['posts' => function ($q) {
            $q->latest()->limit(2);
        }])->get();
        return view('website.index', compact('categories_with_posts', 'post', 'category'));
    }
}