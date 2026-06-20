<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (!app()->runningInConsole()) {
            Paginator::useBootstrap();

            $settings = Cache::remember('site_settings', now()->addHours(2), fn() => Setting::checkSettings());

            $categories = Cache::remember('nav_categories', now()->addHours(2), fn() =>
                Category::with(['children', 'translations', 'children.translations'])
                    ->where(fn($q) => $q->where('parent', 0)->orWhereNull('parent'))
                    ->get()
            );

            $lastFivePosts = Cache::remember('last_five_posts', now()->addMinutes(30), fn() =>
                Post::with(['category.translations', 'user'])->orderBy('id', 'desc')->limit(5)->get()
            );

            view()->share([
                'setting' => $settings,
                'categories' => $categories,
                'lastFivePosts' => $lastFivePosts,
            ]);
        }
    }
}
