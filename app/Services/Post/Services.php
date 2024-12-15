<?php

namespace App\Services\Post;

use App\Models\Post;

class Services
{
    public function store($data)
    {
        // dd($data['category']);
        $category = $data['category'];
        unset($data['category']);

        $post = Post::create($data);
        $post->categorys()->attach($category);
    }

    public function update($data, $manga)
    {
        $category = $data['category'];
        unset($data['category']);

        $manga->update($data);
        $manga->categorys()->sync($category);
    }
}
