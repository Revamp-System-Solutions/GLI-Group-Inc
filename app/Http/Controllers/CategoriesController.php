<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        return Inertia::render('Admin/Posts/Category/ShowPostCategory', [
            "categories" => Categories::orderBy('id', 'ASC')->paginate(10)
        ]);
    }
}
