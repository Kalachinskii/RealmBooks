<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Services\Post\Services;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $service;

    public function __construct(Services $services)
    {
        $this->service = $services;
    }
}
