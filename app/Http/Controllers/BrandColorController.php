<?php

namespace App\Http\Controllers;

use App\Models\BrandColor;
use App\Models\RvmpStatic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BrandColorController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        return Inertia::render('Admin/Site/ShowSiteSetting', [
            "system_colors" => BrandColor::all(),
            "static_images" => RvmpStatic::all(),
        ]);
    }

    public function update(Request $request, $sys_color)
    {
        $system_color = BrandColor::where('alias', $sys_color)->firstOrFail();
        $system_color->value = $request->color;
        $system_color->save();
        $request->session()->flash('success', $system_color->value);
        return redirect()->route('admin.settings');
    }
}
