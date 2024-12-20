<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // для использования фабрики
    use HasFactory;
    use Filterable;
    protected $guarded = false;

    public function categorys()
    {
        return $this->belongsToMany(Category::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'post_users', 'post_id', 'user_id');
    }
}
