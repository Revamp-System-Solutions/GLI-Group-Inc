<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Testimonials;
use App\Models\Portfolio;

class GuestController extends Controller
{

    public function __construct()
    {
        $this->middleware("web");
    }
    public function guestRouter($slug)
    {
        // return Inertia::render('Home/Index',[
        //     "posts" => Testimonials::orderBy('created_at', 'DESC')->skip(0)->take(10)->get()
        // ]);
    }
    public function index()
    {
        return Inertia::render('Home/Index',[
            "posts" => Testimonials::orderBy('created_at', 'DESC')->skip(0)->take(10)->get()
        ]);
    }
    public function showAboutPage()
    {
        return Inertia::render('About');
    }
    public function showPortfolioPage()
    {
        return Inertia::render('Portfolio',[
            "posts" => Portfolio::orderBy('title', 'ASC')->paginate(6)
        ]);
    }
    public function showContactPage()
    {
        return Inertia::render('Contact');
    }
    public function bookFree()
    {
        return Inertia::render('BookFree');
    }
    public function toc()
    {
        return Inertia::render('TermsAndConditions');
    }
    public function privacy()
    {
        return Inertia::render('PrivacyPolicy');
    }
    public function thankYou()
    {
        return Inertia::render('Thankyou');
    }
}
