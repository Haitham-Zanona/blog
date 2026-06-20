<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;

class IndexController extends Controller
{
    public function index()
    {
        $categories_with_posts = Category::with([
            'translations',
            'posts' => fn($q) => $q->latest()->limit(2)->with('translations'),
        ])->get();

        return view('website.index', compact('categories_with_posts'));
    }
}