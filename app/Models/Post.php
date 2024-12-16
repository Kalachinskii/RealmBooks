<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // для использования фабрики
    use HasFactory;
    protected $guarded = [];

    public function categorys()
    {
        return $this->belongsToMany(Category::class);
    }
}
