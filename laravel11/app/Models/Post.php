<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Post
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'slug' => 'judul-artikel-1',
                'title' => 'Judul Artikel 1',
                'author' => 'Sandhika Galih',
                'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit, fugit dignissimos
                accusantium corrupti dicta
                voluptatem consectetur sed aliquam in ratione, neque modi voluptatum pariatur quis? Ad maiores neque tempora
                impedit.'
            ],
            [
                'id' => 2,
                'slug' => 'judul-artikel-2',
                'title' => 'Judul Artikel 2',
                'author' => 'Sandhika Galih',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ab amet distinctio
                iusto facere ullam doloremque corporis nihil et quia odio modi, maiores eius. Commodi enim laudantium
                voluptates cumque eum.'
            ]
        ];
    }

    public static function find($slug):array
    {
        $post= Arr::first(static::all(), fn($post) => $post['slug'] == $slug);

        if(!$post){
            abort(404);
        }
        return $post;
    }
}
