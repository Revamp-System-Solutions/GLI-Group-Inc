<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Inertia\Inertia;

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
        ]);
    }
    public function create()
    {
        return Inertia::render('Admin/Media/UploadMedia');
    }
    public function store(Request $request)
    {
        $this->getValidate($request);
        if($request->type === "RVMP_CLIENT_FILE"){$this->upload($request);}
        else{
            $media = new Media();

            $media->media_name = $request->input('media_name');

            if($request->file('image')) {
                $media->image = $this->upload($request);
            }
            $media->type = $request->type;
            $media->save();
        }

        $request->session()->flash('success', 'Media upload successful!|>><<|Media has been stored in server');

        return redirect()->route(($request->type === "RVMP_CLIENT_FILE")?'admin.settings':'admin.media');
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

        $imageName = $request->type == 'RVMP_CLIENT_FILE' ? $request->media_name. "." . $image->getClientOriginalExtension() : md5(uniqid()) . "." . $image->getClientOriginalExtension();
        $image_path = public_path( $request->type == 'RVMP_CLIENT_FILE' ? 'rvmp-content/rvmp-static': 'rvmp-content/rvmp-uploads');
        if($request->type == 'RVMP_CLIENT_FILE'){unlink($image_path.'/'. $imageName);}
        $image->move($image_path, $imageName);
        if($request->type == 'CLIENT_FILE'){return $imageName;} 
    }
}
