<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use Filterable;
    protected $guarded = [];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
