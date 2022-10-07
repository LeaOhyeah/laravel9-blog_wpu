<?php

use App\Models\Post;

use App\Models\Category;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AdminCategoryController;


Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        'active' => "home",
    ]);
});

Route::get('about', function () {
    return view('about', [
        "title" => "About",
        "active" => "about",
        "name" => "Lea Alyu M.R.",
        "email" => "leasehat@gmail.com",
        "image" => "lea.jpg"
    ]);
});

// Route::get('blog', function () {
//     return view('posts', [
//         "title" => "Blog",
//         "posts" => Post::all(),
//     ]);
// });


// halaman single post
// Route::get('posts/{slug}', function($slug) {
//     return view('post', [
//         'title' => 'Single Post',
//         'post' => Post::find($slug),
//     ]);
// });


// mulai menggunakan controller

Route::get('/posts', [PostController::class, 'index']);

// Route::get('/posts/{slug}', [PostController::class, 'show']);

// route model binding

// Route::get('/posts/{post}', [PostController::class, 'show']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view(
        'categories',
        [
            'title' => 'Post Categories',
            'active' => "categories",
            'categories' => Category::all(),
        ]
    );
});

// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view(
//         'posts',
//         [
//             'title' => "Post by : $category->name",
//             'active' => 'categories',
//             'posts' => $category->relasi_post->load('category', 'author'),
//         ]
//     );
// });

// Route::get('/authors/{author:username}', function(User $author){
//     return view(
//         'posts',
//         [
//             'title' => "Post By : $author->name",
//             'active' => 'posts',
//             // lazy eager loading
//             // 'posts' => $author->posts,
//             'posts' => $author->posts->load('category', 'author'),
//         ]
//     );
// });

// yang harus di ingat
// while card
// type hinting
