<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    // Метод __invoke() вызывается, когда скрипт пытается вызвать объект как функцию.
    public function __invoke()
    {
        // $posts = Post::all();
        // ПАГИНАЦИЯ - выводи по 10
        $posts = Post::paginate(10);
        return view('post.index', compact('posts'));
    }
}
