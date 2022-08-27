<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection;

use Auth;
class MediaController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index(Request $request)
    {
        return Inertia::render('Admin/Media/ShowMedia', [
            "medias" => Media::when($request->fn, function($query, $filename){
                $query->where('media_name', 'LIKE', '%'.$filename.'%');
            })->where('type', '=' ,'CLIENT_FILE')->orderBy('id', 'ASC')->paginate(8)
        ])
        ->with('page_links', collect(Cache::get('admin_page_links'))->mapToGroups(function($item, $key){
            return [boolval($item['is_parent']) && boolval($item['is_active'])  ? 'parentLinks':'subLinks' => $item];
        }))
        ->with("auth.user", Auth::user()->only('name', 'email', 'roles'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->getValidate($request);
      if($request->type === "CLIENT_FILE"){
           
            if($request->file('image')) {
                foreach($request->file('image') as $key => $file){
                    $media = new Media();
                    $media->media_name = $file->getClientOriginalName();
                    $media->image = $this->upload($file);
                
                    $media->type = $request->type;
                    // dd($media);
                    $media->save();
                }
            }
            $request->session()->flash('success', 'Media upload successful!|>><<|Media has been stored in server');
        }

        return redirect()->route('media.admin');
    }

    public function destroyMedia(Request $request, $media_name)
    {    
        $media =  Media::where('media_name', $media_name)->firstOrFail();
        if($media->type === "CLIENT_FILE"){
        $media->delete();
        $request->session()->flash('success', $media_name.' has been removed!|>><<|All done');
        }
        return redirect()->route('media.admin');
    }
    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    private function getValidate(Request $request, $id = null): void
    {
        $data = [
            // 'media_name' => 'required',
            'image' => 'required|array',
            'image.*' => 'image|mimes:jpeg,png,jpg,svg|max:1024'
        ];

        $this->validate($request, $data);
    }

    private function upload($request)
    {
        $image = $request;

        $imageName = md5(uniqid()) . "." . $image->getClientOriginalExtension();
        $image_path = 'rvmp-content/rvmp-uploads';

        $image->move($image_path, $imageName);
       return $imageName;
    }
}
