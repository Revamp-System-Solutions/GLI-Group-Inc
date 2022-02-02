<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class FormResponseController extends Controller
{
    public function sendMessage(Request $request)
    {
        dd($request);
    }
}
