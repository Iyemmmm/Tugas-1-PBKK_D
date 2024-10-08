<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
// use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => Post::filter(request(['search','category','author']))->latest()->paginate(10)->withQueryString()]);
});
Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post',['title' => 'Article','post' => $post]);
});
Route::get('/authors/{user:username}', function (User $user) {
    return view('posts',['title' => count($user->posts).' Articles by '. $user->name,'posts' => $user->posts]);
});
Route::get('/categories/{category:name_category}', function (Category $category) {
    return view('posts',['title' => 'Category: '. $category->name_category,'posts' => $category->posts]);
});
Route::get('/about', function () {
    return view('about', ['title' => 'About'], ['name' => 'Willyam']);
});
Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
