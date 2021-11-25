<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth")->except(["index"]);
    }

    public function index()
    {
        return Inertia::render('BlogPost', [
            "posts" => Post::orderBy('id', 'DESC')->paginate(10)
        ]);
    }

}
