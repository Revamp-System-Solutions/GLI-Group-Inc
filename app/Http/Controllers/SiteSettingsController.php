<?php

namespace App\Http\Controllers;

use App\Models\BrandColor;
use App\Models\Media;
use App\Models\Categories;
use App\Models\Subcategories;
use App\Models\User;
use App\Models\Role;
use App\Models\WebSetting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Http\Controllers\WebSettingController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection;
use Auth;


class SiteSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $catssubcats = array();
        $system_colors = array();
        $settings = array();
        foreach(Categories::where('name', '!=' ,'Pages')->where('name', '!=' ,'Templates')->get() as $category){
            $catssubcats[$category->name] = Subcategories::whereCategoryId($category->id)->where('name', '!=' ,'Comments')->orderBy('id', 'ASC')->paginate(
                $perPage = 3, $columns = ['*'], $pageName = $category->name
            );          
        }
        foreach(BrandColor::distinct()->get('group') as $key=>$site_color_group){
            $mask = array_filter(explode('_',$site_color_group->group), fn($value) => !is_null($value) && $value !== ' ');
            unset($mask[0]);
            $group = implode(' ', $mask);
            $system_colors[$group] = BrandColor::where('group', '=', $site_color_group['group'])->get();
        }

        $static_img= Media::where('type', '=' ,'RVMP_CLIENT_FILE')->get();

        $websettings = new WebSettingController;
        $settings = $websettings->getWebSettings();

        // dd($settings);

        return Inertia::render('Admin/Site/ShowSiteSetting', [
            "categories"    => $catssubcats,
            "system_colors" =>  $system_colors,
            "static_images" => $static_img,
            "settings" => $settings,
        ])
        ->with('page_links', collect(Cache::get('admin_page_links'))->mapToGroups(function($item, $key){
            return [boolval($item['is_parent']) ? 'parentLinks':'subLinks' => $item];
        }))
        ->with("auth.user", Auth::user()->only('name', 'email', 'roles'));
    }
   

    public function storeSubcat(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'max:100'],

            'description' => ['required', 'min:4']
        ]);
        $subcat = new Subcategories();
        $subcat->name =  $request->name;
        $subcat->description = $request->description;
        $cat = Categories::where('name', $request->category)->firstOrFail();
        $subcat->category_id = $cat->id;
        $subcat->permission = '-xw';
        $subcat->save();
        $request->session()->flash('success', $request->category.'>'.$request->name.' has been added!|>><<|It can now be used as a category for blogs');
        return back();
    }

    public function updateSubcat(Request $request, $action)
    {
        $this->validate($request, [
            'name' => ['required', 'max:100'],

            'description' => ['required', 'min:4']
        ]);
       
        $subcat =  Subcategories::where('name', $request->category)->firstOrFail();
        $subcat->name =  $request->name;
        $subcat->description = $request->description;

        $subcat->save();
        $request->session()->flash('success', $request->name.' has been updated!|>><<|No posts had been harmed');
        return back();
    }


    public function updateSiteColor(Request $request)
    {
        $this->validate($request, [
            'color' => ['required'],
        ]);
        $system_color = BrandColor::where('alias', $request->alias)->firstOrFail();
        $system_color->value = $request->color;
        $system_color->save();
        $myfile = fopen("css/client.css", "w") or die("Unable to open file!");
        $txt = ':root{ ';
        fwrite($myfile, $txt); 
        foreach (BrandColor::all() as $sys_colors) {
            $txt = $sys_colors->var_name.": ".$sys_colors->value.';';
            fwrite($myfile, $txt);
        }      
        $txt = '}';
        fwrite($myfile, $txt);
        fclose($myfile);
     
        $request->session()->flash('success', $request->alias.' has been updated!|>><<|Refresh the site to view the changes');
        return back();
    }
    public function updateBrandImg(Request $request, $mn)
    {
  
        $this->getValidate($request);
        if($request->type === "RVMP_CLIENT_FILE"){
                
            $media = Media::where('media_name',$mn)->firstOrFail();
            if($request->file('image')) {
                $media->image = $this->upload($request);
            }

            $media->save();
        

            $request->session()->flash('success', $media->media_name.' Update successful!|>><<|Refresh the site to view the changes');
        }
        return redirect()->route('settings.branding');
    }
    public function updateGeneralSettings(Request $request)
    {
        $this->validate($request, [
            'short_name' => ['required', 'exists:web_settings'],
            'value' => ['required']
        ]);
        $web_setting = WebSetting::whereShortName($request->short_name)->first();
        $web_setting->update($request->all());
        $request->session()->flash('success', $web_setting->attribute.' has been updated!|>><<|Please check the site/pges affected to see changes');
        return back();
    }
    public function destroySubcat(Request $request, $subcat)
    {    
        $subcategory =  Subcategories::where('name', $subcat)->firstOrFail();
        $subcategory->delete();
        $request->session()->flash('success', $subcat.' has been removed!|>><<|No posts had been harmed');
        return redirect()->route('settings.admin');
    }
     /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    private function getValidate(Request $request, $id = null): void
    {
        $data = [
            'media_name' => 'required',
            'image' => 'required',
        ];

        $this->validate($request, $data);
    }

    private function upload($request)
    {
        $image = $request->file('image');

        $imageName = md5(uniqid()) . "." . $image->getClientOriginalExtension();
        $image_path = public_path( $request->type == 'RVMP_CLIENT_FILE' ? 'rvmp-content/rvmp-static': 'rvmp-content/rvmp-uploads');
        if($request->type == 'RVMP_CLIENT_FILE'){
            $tmp = Media::where('media_name', $request->media_name)->firstOrFail();
            unlink($image_path.'/'. $tmp->image);
        }
        $image->move($image_path, $imageName);
       return $imageName;
    }

}
