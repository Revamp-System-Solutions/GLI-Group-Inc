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
use App\Models\Portfolio;
use Auth;


class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $pages = Page::orderBy('page_title', 'ASC')->paginate(8);
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
        $render_dir = 'Admin/Page/List/Template1/'.$page->render;
        return Inertia::render($render_dir)
            ->with("auth.user", Auth::user()->only('name', 'email', 'roles'))
            ->with("page.data", $page)
            ->with("site_profile", WebSetting::where('attribute', '=', 'Site Profile')->get()->toArray())
            ->with("socials", WebSetting::where('attribute', '=', 'Social Media links')->get())
            ->with("posts.portfolio", Portfolio::orderBy('title', 'ASC')->paginate(6));
    }
    public function saveUpdatePage(Request $request, $slug)
    {

    
        $page = Page::where('slug', $slug)->firstOrFail();
        $data = [];

        switch ($slug) {
            case "home":
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
              break;
            case "about":
                $this->validate($request, [
                    '*.*.image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:1024',
                ]);

                $about = Arr::except($request->all(),['head_banner','banner']);
                $about['head_banner'] = array();
                $about['banner'] = array();
                $hb = $request->head_banner;
                $cta = $request->banner;
                $hb_img = $request->head_banner['image'] !== NULL ? $this->saveImage(array("data"=>$request->head_banner['image'], "name"=>"About-Header Banner Image")): $request->head_banner['img_url'];
                $hb['img_url'] = $hb_img;

                $cta_img = $request->banner['image'] !== NULL ? $this->saveImage(array("data"=>$request->banner['image'], "name"=>"About-Header Banner Image")): $request->head_banner['img_url'];
                $cta['img_url'] = $cta_img;
              
                $about['head_banner'] = Arr::except($hb,['image']);
                $about['banner'] = Arr::except($cta,['image']);
            
                $data =  $about;
               
                
              break;
            case "contact-us":
                $this->validate($request, [
                    '*.*.image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:1024',
                ]);

                $contact = Arr::except($request->all(),['head_banner','contact_details']);
                $contact['head_banner'] = array();
             
                $hb = $request->head_banner;
       
                $hb_img = $request->head_banner['image'] !== NULL ? $this->saveImage(array("data"=>$request->head_banner['image'], "name"=>"Contact-Header Banner Image")): $request->head_banner['img_url'];
                $hb['img_url'] = $hb_img;

      
              
                $contact['head_banner'] = Arr::except($hb,['image']);

            
                $data =  $contact;
              break;
            case "book-free":
                $this->validate($request, [
                    'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:1024',
                ]);
               
                $bf = $request->all();
              
                $bf_img = $request->image !== NULL ? $this->saveImage(array("data"=>$request->image, "name"=>"Book free-Header Banner Image")): $request->img_url;
                $bf['img_url'] = $bf_img;

      
              
                $data = Arr::except($bf,['image']);
                break;
            case "portfolio":
                $this->validate($request, [
                    '*.image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:1024',
                ]);
               
                $bf = $request->head_banner;
              
                $bf_img = $request->head_banner['image'] !== NULL ? $this->saveImage(array("data"=>$request->head_banner['image'], "name"=>"subpage-Header Banner Image")): $request->head_banner['img_url'];
                $bf->head_banner['img_url'] = $bf_img;

      
              
                $data['head_banner'] = Arr::except($bf,['image']);
                break;
            case "thank-you":
                $data = $request->all();
                break;
            default:
              echo "Your favorite color is neither red, blue, nor green!";
          }
  
    //   dd($data);
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