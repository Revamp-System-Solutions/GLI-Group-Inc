<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Subcategories;
use App\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Inertia\Inertia;


class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth")->except(["index", "show"]);
    }

    public function index()
    {
        return Inertia::render('BlogPost', [
            "posts" => Post::orderBy('id', 'DESC')->paginate(10),
        ]);
    }
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        // dd($post);
        return Inertia::render('PostView', [
            'post' => $post
        ]);
    }
    public function adminPost()
    {
        return Inertia::render('Admin/Posts/ShowPost', [
            "posts" => Post::orderBy('id', 'DESC')->paginate(15)
        ]);
    }
    
    public function create()
    {
        $medias = Media::all()->pluck('image_url', 'media_name');
        $categories = Subcategories::all()->pluck('name', 'id');
        return Inertia::render('Admin/Posts/CreatePost', ['categories' => $categories, "medias" => $medias]);
    }

    public function store(Request $request)
    {
        $this->getValidate($request);

        $post = new Post();

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->short_text = $request->input('short_text');
        $post->author = $request->input('author');
        $post->subcategory_id = $request->input('category');
        $post->slug = $request->input('slug');
        // dd($request);
        if($request->file('image')) {
            $post->image = $this->upload($request);
             
            $media = new Media();
            $file = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($file,PATHINFO_FILENAME);
            $media->media_name = $fileName;
            
            $media->image = $post->image;
     
            $media->save();
            $post->image_id = $media->id;
        }else{
            $media = Media::where('media_name', $request->from_library)->firstOrFail();
            $post->image= $media->image;
            $post->image_id = $media->id;
        }

        $post->save();

        $request->session()->flash('success', 'Post created successfully!');

        return redirect()->route('adminPost');
    }
  
    public function edit($slug)
    {
        // $post = Post::where('slug', $slug)->firstOrFail();
        return Inertia::render('Admin/Posts/EditPost', [
            'post' => Post::where('slug', $slug)->firstOrFail(),
            'categories' => Subcategories::all()->pluck('name', 'id'),
            'medias' => Media::all()->pluck('image_url', 'media_name')
        ]);
    }

    public function update(Request $request, $slug)
    {
        $this->getValidate($request, $slug);

        $post = Post::where('slug', $slug)->firstOrFail();

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->short_text = $request->input('short_text');
        $post->edited_by = $request->input('author');
        $post->subcategory_id = $request->input('category');
        $post->slug = $request->input('slug');

        if($request->file('image')) {
            $post->image = $this->upload($request);
            $media = new Media();
            $file = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($file,PATHINFO_FILENAME);
            $media->media_name = $fileName;
            
            $media->image = $post->image;
 
    
            $media->save();
            $post->image_id = $media->id;
        }else if(!is_null($request->from_library)){
            $media = Media::where('media_name', $request->from_library)->firstOrFail();
            if($media->image != $post->image){
                $post->image= $media->image;
                $post->image_id = $media->id;
            }
        }
        $post->save();

        $request->session()->flash('success', 'Post updated successfully!');

        return redirect()->route('adminPost');
    }

    public function destroy(Request $request, $slug)
    {

        $post =Post::where('slug', $slug)->firstOrFail();
        
        $post->delete();
        $request->session()->flash('success', 'Post deleted successfully!');

        return redirect()->route('adminPost');
    }

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    private function getValidate(Request $request, $id = null): void
    {
        $data = [
            'title' => 'required',
            'slug' => 'required',
            'short_text' => 'required',
            'content' => 'required',
            'category' => 'required',
            'author' => 'required'
        ];

        $this->validate($request, $data);
    }

    private function upload($request)
    {
        $image = $request->file('image');

        $imageName = md5(uniqid()) . "." . $image->getClientOriginalExtension();

        $image->move(public_path('rvmp-content/rvmp-uploads'), $imageName);

        return $imageName;
    }
}
