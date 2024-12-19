<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;

class LoginController extends Controller
{
    public function __invoke()
    {
        return view('user.login');
    }
}
