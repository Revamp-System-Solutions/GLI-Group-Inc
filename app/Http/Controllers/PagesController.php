<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection;

use Auth;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $pages = Page::orderBy('id', 'ASC')->paginate(8);
        return Inertia::render('Admin/Page/ShowPage')
            ->with('page_list', $pages)
            ->with('page_links', collect(Cache::get('admin_page_links'))->mapToGroups(function ($item, $key) {
                return [boolval($item['is_parent']) && boolval($item['is_active'])  ? 'parentLinks' : 'subLinks' => $item];
            }))
            ->with("auth.user", Auth::user()->only('name', 'email', 'roles'));
    }
    public function updatePage($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        if ($slug === 'home') {
            return Inertia::render('Admin/Page/List/Template1/HomePage')
                ->with("auth.user", Auth::user()->only('name', 'email', 'roles'));
        } else if ($slug === 'about') {
            return Inertia::render('Admin/Page/List/Template1/AboutPage')
                ->with("auth.user", Auth::user()->only('name', 'email', 'roles'));
        }
    }
}