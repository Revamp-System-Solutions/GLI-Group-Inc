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
        $this->middleware("auth")->except('index','showAboutPage','showPortfolioPage','showContactPage');
    }

    public function index()
    {
        return Inertia::render('Index',[
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
}
