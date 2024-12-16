<?php

namespace App\Http\Controllers\Post;

// use App\Http\Requests\Post\FilterRequest;

use App\Http\Controllers\Post\BaseController;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;

class IndexController extends BaseController
{
    // Метод __invoke() вызывается, когда скрипт пытается вызвать объект как функцию.
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        // array_filter($data) - если не пуст то вызовет келбек
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        // filter() - передан от трейта (scopeFilter - scope вырезаеться / F=f становиться)
        // $posts = Post::filter($filter)->get();
        $posts = Post::filter($filter)->paginate(10);
        // ПАГИНАЦИЯ - выводи по 10 ($posts = Post::paginate(10); без учёа фильтра)
        return view('post.index', compact('posts'));
    }
}
