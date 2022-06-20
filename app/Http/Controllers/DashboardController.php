<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection;
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
        return Inertia::render('Admin/Dashboard')
        ->with('page_links', collect(Cache::get('admin_page_links'))->mapToGroups(function($item, $key){
            return [boolval($item['is_parent']) ? 'parentLinks':'subLinks' => $item];
        }))
        ->with('auth.user', Auth::user()->only('name', 'email', 'roles'));
    }

}
