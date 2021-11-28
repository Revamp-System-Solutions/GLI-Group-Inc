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

    public function index()
    {
        return Inertia::render('Admin/Media/ShowMedia', [
            "medias" => Media::orderBy('id', 'ASC')->paginate(30)
        ]);
    }
    public function create()
    {
        return Inertia::render('Admin/Media/UploadMedia');
    }
    public function store(Request $request)
    {
        $this->getValidate($request);

        $media = new Media();

        $media->media_name = $request->input('medianame');

        if($request->file('image')) {
            $media->image = $this->upload($request);
        }

        $media->save();

        $request->session()->flash('success', 'Media created successfully!');

        return redirect()->route('admin.media');
    }
    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    private function getValidate(Request $request, $id = null): void
    {
        $data = [
            'medianame' => 'required',
        ];

        $this->validate($request, $data);
    }

    private function upload($request)
    {
        $image = $request->file('image');

        $imageName = md5(uniqid()) . "." . $image->getClientOriginalExtension();

        $image->move(public_path('uploads'), $imageName);

        return $imageName;
    }
}
