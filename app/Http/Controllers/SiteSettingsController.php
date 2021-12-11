<?php

namespace App\Http\Controllers;

use App\Models\BrandColor;
use App\Models\Media;
use App\Models\Categories;
use App\Models\Subcategories;
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
        $catssubcats = array();
        foreach(Categories::where('name', '!=' ,'Pages')->where('name', '!=' ,'Templates')->get() as $category){
            $catssubcats[$category->name] = Subcategories::whereCategoryId($category->id)->where('name', '!=' ,'Comments')->orderBy('id', 'ASC')->paginate(
                $perPage = 3, $columns = ['*'], $pageName = $category->name
            );          
        }
      

        return Inertia::render('Admin/Site/ShowSiteSetting', [
            "categories" => $catssubcats,
            "system_colors" => BrandColor::orderBy('id', 'ASC')->paginate( $perPage = 4, $columns = ['*'], $pageName = 'site_colors'),
            "static_images" => Media::where('type', '=' ,'RVMP_CLIENT_FILE')->get(),
            
            
        ]);
    }

    public function storeSubcat(Request $request)
    {
       
        $subcat = new Subcategories();
        $subcat->name =  $request->name;
        $subcat->description = $request->description;
        $cat = Categories::where('name', $request->category)->firstOrFail();
        $subcat->category_id = $cat->id;
        $subcat->permission = '-xw';
        $subcat->save();
        $request->session()->flash('success', $request->category.'>'.$request->name.' has been added!|>><<|It can now be used as a category for blogs');
        return redirect()->route('admin.settings');
    }

    public function updateSubcat(Request $request, $action)
    {
       
        $subcat =  Subcategories::where('name', $request->category)->firstOrFail();
        $subcat->name =  $request->name;
        $subcat->description = $request->description;

        $subcat->save();
        $request->session()->flash('success', $request->name.' has been updated!|>><<|No posts had been harmed');
        return redirect()->route('admin.settings');
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
    public function updateBrandImg(Request $request)
    {
  
        $this->getValidate($request);
        if($request->type === "RVMP_CLIENT_FILE"){
                
            $media = Media::where('media_name',$request->media_name)->firstOrFail();
            if($request->file('image')) {
                $media->image = $this->upload($request);
            }

            $media->save();
        

            $request->session()->flash('success', $media->media_name.' Update successful!|>><<|Refresh the site to view the changes');
        }
        return redirect()->route('admin.settings');
    }
    public function destroySubcat(Request $request, $subcat)
    {    
        $subcategory =  Subcategories::where('name', $subcat)->firstOrFail();
        $subcategory->delete();
        $request->session()->flash('success', $subcat.' has been removed!|>><<|No posts had been harmed');
        return redirect()->route('admin.settings');
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
