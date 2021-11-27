<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth")->except(["index"]);
    }

    public function index()
    {
        return Inertia::render('BlogPost', [
            "posts" => Post::orderBy('id', 'DESC')->paginate(10)
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
        return Inertia::render('Admin/Posts/CreatePost');
    }

    public function store(Request $request)
    {
        $this->getValidate($request);

        $post = new Post();

        $post->title = $request->input('title');
        $post->content = $request->input('content');

        if($request->file('image')) {
            $post->image = $this->upload($request);
        }

        $post->save();

        $request->session()->flash('success', 'Post created successfully!');

        return redirect()->route('adminPost');
    }

    public function edit($id)
    {
        return Inertia::render('Admin/Posts/EditPost', [
            'post' => Post::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->getValidate($request, $id);

        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->content = $request->input('content');

        if($request->file('image')) {
            $post->image = $this->upload($request);
        }

        $post->save();

        $request->session()->flash('success', 'Post updated successfully!');

        return redirect()->route('adminPost');
    }

    public function destroy(Request $request, $id)
    {

        $post = Post::find($id);
        $image_path = public_path('uploads').'/'.$post->image;
        unlink($image_path);
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
            'content' => 'required'
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
