<?php

namespace App\Http\Controllers;

use App\Models\BrandColor;
use App\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SiteSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        return Inertia::render('Admin/Site/ShowSiteSetting', [
            "system_colors" => BrandColor::all(),
            "static_images" => Media::where('type', '=' ,'RVMP_CLIENT_FILE')->get(),
            
        ]);
    }

    public function update(Request $request, $sys_color)
    {
        $system_color = BrandColor::where('alias', $sys_color)->firstOrFail();
        $system_color->value = $request->color;
        $system_color->save();
        $myfile = fopen("css/client.css", "w") or die("Unable to open file!");
        $txt = ':root{ ';
        fwrite($myfile, $txt); 
        foreach (BrandColor::all() as $sys_color) {
            $txt = $sys_color->var_name.": ".$sys_color->value.';';
            fwrite($myfile, $txt);
        }      
        $txt = '}';
        fwrite($myfile, $txt);
        fclose($myfile);
     
        $request->session()->flash('success', $request->alias.' has been updated!|>><<|Refresh the site to view the changes');
        return redirect()->route('admin.settings');
    }
   
}
