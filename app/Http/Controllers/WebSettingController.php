<?php

namespace App\Http\Controllers;


use App\Models\WebSetting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Inertia\Inertia;


class WebSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        
    }
}
