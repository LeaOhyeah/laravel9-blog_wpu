<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // public function index()
    // {
    //     return view('posts', [
    //         "title" => "All Posts",
    //         // "posts" => Post::all(),
    //         "posts" => Post::latest()->get(),
    //     ]);
    // }

    public function index()
    {
        $title = '';

        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('posts', [
            "title" => "All Posts" . $title,
            "active" => "posts",
            // eager loading
            // "posts" => Post::with(['author', 'category'])->latest()->get(),
            // "posts" => Post::latest()->get(),
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString(),
        ]);
    }

    // public function show($slug)
    // {
    //     return view('post', [
    //         'title' => 'Single Post',
    //         'post' => Post::find($slug),
    //     ]);
    // }
    // mysqli = (select * from post where slug = '$slug')

    // route model binding
    public function show(Post $post)
    {
        return view('post', [
            'title' => 'Single Post',
            "active" => "posts",
            'post' => $post
        ]);
    }
}
