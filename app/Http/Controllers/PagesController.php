<?php

namespace App\Http\Controllers;

use App\Models\Page;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use App\Models\WebSetting;
use App\Models\Media;
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
                ->with("auth.user", Auth::user()->only('name', 'email', 'roles'))
                ->with("page.data", $page);
        } else if ($slug === 'about') {
            return Inertia::render('Admin/Page/List/Template1/AboutPage')
                ->with("auth.user", Auth::user()->only('name', 'email', 'roles'));
        } else if ($slug === 'contact-us') {
            return Inertia::render('Admin/Page/List/Template1/ContactPage')
                ->with("auth.user", Auth::user()->only('name', 'email', 'roles'))
                ->with("site_profile", WebSetting::where('attribute', '=', 'Site Profile')->get()->toArray());
        }
    }
    public function saveUpdatePage(Request $request, $slug)
    {

       
        $data = [];
        if($slug === 'home'){
         
            $this->validate($request, [
                '*.lead_image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:1024',
                '*.tabList.*.tab_image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:1024',
                '*.tabPanels.*.service_highlights.*.icon_image' => 'nullable|image|mimes:png,svg|max:1024|dimensions:ratio=1/1',
            ]);
            $ld_img =  $request->lead_banner['lead_image'] !== NULL ? $this->saveImage(array("data"=>$request->lead_banner['lead_image'], "name"=>"Home-Lead Banner Image")): $request->lead_banner['lead_display_image'];
            $lead_banner = $request->lead_banner;
            $lead_banner = Arr::except($lead_banner,['lead_image']);

            $lead_banner['lead_display_image'] = $ld_img;

            $services = ['tabList'=>$request->services['tabList'], 'tabPanels' => $request->services['tabPanels']];    
            foreach($request->services['tabList'] as $x => $val){
                $tbList_img = $request->services['tabList'][$x]['tab_image'] !== NULL ? $this->saveImage(array("data"=>$request->services['tabList'][$x]['tab_image'], "name"=>"Home-Tab Image-".$x)):$request->services['tabList'][$x]['image_url'];
                $services['tabList'][$x] = Arr::except($request->services['tabList'][$x],['tab_image']);
                
                $services['tabPanels'][$x]['service_highlights'] = [];
                if($request->services['tabList'][$x]['tab_image'] !== NULL) {
                    $services['tabList'][$x]['image_url'] = $tbList_img;
                    $services['tabPanels'][$x]['feature_image_url'] = $tbList_img;
                }
                // $highlights
                foreach($request->services['tabPanels'][$x]['service_highlights'] as $x2 => $val2){
                    //icon_image
                    $ico = $request->services['tabPanels'][$x]['service_highlights'][$x2]['icon_image'] !== NULL ? $this->saveImage(array("data"=>$request->services['tabPanels'][$x]['service_highlights'][$x2]['icon_image'], "name"=>"Home-Panel Service Icon-".$x)):$request->services['tabPanels'][$x]['service_highlights'][$x2]['icon_url'];
                    
                    $services['tabPanels'][$x]['service_highlights'][$x2] = Arr::except($request->services['tabPanels'][$x]['service_highlights'][$x2],['icon_image']);
                   if($request->services['tabPanels'][$x]['service_highlights'][$x2]['icon_image'] !== NULL) $services['tabPanels'][$x]['service_highlights'][$x2]['icon_url'] = $ico;
                }
                
            }
            $data['lead_banner'] =  $lead_banner;
            $data['services'] =  $services;
        }
        // dd($data);
        $page = Page::where('slug', $slug)->firstOrFail();
        $page->page_content = json_encode($data, JSON_FORCE_OBJECT);
        $page->update();
        $request->session()->flash('success', 'Page has been Updated|>><<|Page updated successfully!');

        return redirect()->route('page.admin')
                         ->with('success', 'Page has been Updated|>><<|Page updated successfully!');
  
    }
    private function saveImage($request){
    //    dd($request);
    
        $oldmedia =  Media::where('media_name', $request['name'])->first();

        if($oldmedia !== NULL){
            if($oldmedia->type === "CLIENT_FILE"){
                $oldmedia->media_name = md5(uniqid()) . $request['name'];
            }
            $oldmedia->save();
        }

        if($request !== NULL){
        $media = new Media();
  
        $media->media_name = $request['name'];
        $media->image = $this->upload($request['data']);
        if(str_contains($request['name'], "ICON")){
            $media->classification = 'ICONS';
            $media->package_name = 'CUSTOM';
        }
        $media->type = "CLIENT_FILE";
        $media->save();
        return '/rvmp-content/rvmp-uploads/'.$media->image;
        }

        return NULL;
    }
    private function upload($image)
    {
        $image = $image;
        $data = getimagesize($image);
        $width = $data[0];
        $height = $data[1];
        $imageName = $width."x".$height." - ".md5(uniqid()) . "." . $image->getClientOriginalExtension();
        $image_path = 'rvmp-content/rvmp-uploads';

        $image->move($image_path, $imageName);
       return $imageName;
    }
}