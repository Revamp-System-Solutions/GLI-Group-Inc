<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Testimonials;
use App\Models\Portfolio;
use App\Models\Page;
use App\Models\WebSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection;
use Illuminate\Support\Arr;

class GuestController extends Controller
{

    public function __construct()
    {
        $this->middleware("web");
    }
   
    public function index()
    {
      
        $page = Page::where('slug','=', 'home')->firstOrFail();
        return Inertia::render('Home/Index',[
            "posts" => Testimonials::orderBy('created_at', 'DESC')->skip(0)->take(10)->get()
        ])
        ->with('page_links', collect(Cache::get('guest_page_links'))->mapToGroups(function($item, $key){
            return [boolval($item['is_parent']) && boolval($item['is_active']) ? 'parentLinks':'subLinks' => $item];
        }))
       
        ->with("page.data", $page);
    }
    public function showAboutPage()
    {
        $page = Page::where('slug','=', 'about')->firstOrFail();
        return Inertia::render('About')
        ->with('page_links', collect(Cache::get('guest_page_links'))->mapToGroups(function($item, $key){
            return [boolval($item['is_parent']) && boolval($item['is_active']) ? 'parentLinks':'subLinks' => $item];
        }))
        ->with("page.data", $page);
    }
    public function showPortfolioPage()
    {
        $page = Page::where('slug','=', 'portfolio')->firstOrFail();
        return Inertia::render('Portfolio',[
            "posts.portfolio" => Portfolio::orderBy('title', 'ASC')->paginate(6)
        ])
        ->with('page_links', collect(Cache::get('guest_page_links'))->mapToGroups(function($item, $key){
            return [boolval($item['is_parent']) && boolval($item['is_active']) ? 'parentLinks':'subLinks' => $item];
        }))
        ->with("page.data", $page);
    }
    public function showContactPage()
    {
        $page = Page::where('slug','=', 'contact-us')->firstOrFail();
        return Inertia::render('Contact')
        ->with('page_links', collect(Cache::get('guest_page_links'))->mapToGroups(function($item, $key){
            return [boolval($item['is_parent']) && boolval($item['is_active']) ? 'parentLinks':'subLinks' => $item];
        }))
        ->with("page.data", $page)
        ->with("site_profile", WebSetting::where('attribute', '=', 'Site Profile')->get()->toArray())
        ->with("socials", WebSetting::where('attribute', '=', 'Social Media links')->get());
    }
    public function bookFree()
    {
        $page = Page::where('slug','=', 'book-free')->firstOrFail();
        return Inertia::render('BookFree')
        ->with('page_links', collect(Cache::get('guest_page_links'))->mapToGroups(function($item, $key){
            return [boolval($item['is_parent']) && boolval($item['is_active']) ? 'parentLinks':'subLinks' => $item];
        }))
        ->with("page.data", $page);
    }
    public function toc()
    {
        return Inertia::render('TermsAndConditions')
        ->with('page_links', collect(Cache::get('guest_page_links'))->mapToGroups(function($item, $key){
            return [boolval($item['is_parent']) && boolval($item['is_active']) ? 'parentLinks':'subLinks' => $item];
        }));
    }
    public function privacy()
    {
        return Inertia::render('PrivacyPolicy')
        ->with('page_links', collect(Cache::get('guest_page_links'))->mapToGroups(function($item, $key){
            return [boolval($item['is_parent']) && boolval($item['is_active']) ? 'parentLinks':'subLinks' => $item];
        }));
    }
    public function thankYou()
    {
        $page = Page::where('slug','=', 'thank-you')->firstOrFail();
        return Inertia::render('Thankyou')
        ->with('page_links', collect(Cache::get('guest_page_links'))->mapToGroups(function($item, $key){
            return [boolval($item['is_parent']) && boolval($item['is_active']) ? 'parentLinks':'subLinks' => $item];
        }))
        ->with("page.data", $page);
    }
}
