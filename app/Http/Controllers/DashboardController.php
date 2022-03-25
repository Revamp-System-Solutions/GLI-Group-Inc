<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Auth;

class DashboardController extends Controller
{   
    public function __construct()
    {
        $this->middleware("auth")->except(["index"]);
    }

    public function index()
    {
       
    }

    public function viewDashboard()
    {
        $user = Auth::user();
        return Inertia::render('Admin/Dashboard')->with('auth.user', $user->only('name', 'email', 'roles'));
    }

}
