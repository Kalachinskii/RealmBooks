<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Hit;

class CreateController extends Controller
{
    // Метод __invoke() вызывается, когда скрипт пытается вызвать объект как функцию.
    public function __invoke()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }
}
