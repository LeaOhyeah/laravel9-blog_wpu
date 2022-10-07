<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Lea Alyu Maulana Rochman",
            "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi quisquam nihil adipisci blanditiis vero cupiditate vitae maxime. Incidunt nesciunt dicta ullam explicabo vel, quo repellat sapiente architecto amet tenetur aliquid quos voluptatum, eligendi cupiditate eos illum porro assumenda inventore sequi accusantium recusandae. Iste dolorum sint animi, hic eius modi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi quisquam nihil adipisci blanditiis vero cupiditate vitae maxime. Incidunt nesciunt dicta ullam explicabo vel, quo repellat sapiente architecto amet tenetur aliquid quos voluptatum, eligendi cupiditate eos illum porro assumenda inventore sequi accusantium recusandae. Iste dolorum sint animi, hic eius modi."
        ], [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Bukan lea",
            "body" => "Lorem dua ipsum dolor sit amet, consectetur adipisicing elit. Eligendi quisquam nihil adipisci blanditiis vero cupiditate vitae maxime. Incidunt nesciunt dicta ullam explicabo vel, quo repellat sapiente architecto amet tenetur aliquid quos voluptatum, eligendi cupiditate eos illum porro assumenda inventore sequi accusantium recusandae. Iste dolorum sint animi, hic eius modi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi quisquam nihil adipisci blanditiis vero cupiditate vitae maxime. Incidunt nesciunt dicta ullam explicabo vel, quo repellat sapiente architecto amet tenetur aliquid quos voluptatum, eligendi cupiditate eos illum porro assumenda inventore sequi accusantium recusandae. Iste dolorum sint animi, hic eius modi."
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $post = static::all();
        return  $post->firstWhere('slug', $slug);

        // jika manual maka seperti ini
        // $posts = self::$blog_posts;
        // $post = [];
        // foreach ($posts as $p) {
        //     if ($p['slug'] === $slug) {
        //         $post = $p;
        //     }
        // }
        // return $post

    }
}
