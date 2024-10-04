<?php

use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::group(['prefix'=>'dashboard' , 'as'=>'dashboard.', 'middleware' => ['auth', 'checkLogin']], function() {
    Route::get('/',function(){
        return view('dashboard.layouts.layout');
    })->name('dashboard');
    Route::get('/charts', function () {
        return view('dashboard.layouts.charts');
    })->name('charts');
    Route::get('/settings', function () {
        return view('dashboard.settings');
    })->name('settings');
    Route::post('/settings/update/{setting}', [SettingController::class, 'update'])
        ->name('settings.update');

    Route::get('/users/all', [UserController::class, 'getUsersDatatable'])->name('users.all');
    Route::post('/users/delete', [UserController::class, 'delete'])->name('users.delete');



    // Route::get('/category/all', [CategoryController::class, 'getCategoriesDatatable'])->name('category.all');
    // Route::post('/category/delete', [CategoryController::class, 'delete'])->name('category.delete');



    // Route::get('/posts/all', [PostsController::class, 'getPostsDatatable'])->name('posts.all');
    // Route::post('/posts/delete', [PostsController::class, 'delete'])->name('posts.delete');


    Route::resources([
        'users' => UserController::class,
        // 'category' => CategoryController::class,
        // 'posts' => PostsController::class,
    ]);


});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
