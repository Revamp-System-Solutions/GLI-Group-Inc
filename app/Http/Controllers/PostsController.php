<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Portfolio;
use App\Models\Testimonials;
use App\Models\Subcategories;
use App\Models\Media;
use App\Models\Form;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection;
 use Auth;

class PostsController extends Controller
{
   

    public function __construct()
    {
        $this->middleware("auth")->except(["index", "show"]);
    }

    public function index()
    {
       
      
        return Inertia::render('BlogPost', [
            "posts" => Post::join('subcategories', 'posts.subcategory_id', '=', 'subcategories.id')->orderBy('posts.created_at', 'DESC')->paginate(4),
            "forms" => Form::where('id','=','1')->get(),
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
   
        return Inertia::render('Admin/Posts/Blog/ShowPost', [
            "posts" => Post::orderBy('id', 'DESC')->paginate(15)
        ])
        ->with('page_links', collect(Cache::get('admin_page_links'))->mapToGroups(function($item, $key){
            return [boolval($item['is_parent']) && boolval($item['is_active']) ? 'parentLinks':'subLinks' => $item];
        }))
        ->with("auth.user", Auth::user()->only('name', 'email', 'roles'));
    }
    
    public function create()
    {
        $medias = Media::where('type','=','CLIENT_FILE')->get()->pluck('image_url', 'media_name');
        $categories = Subcategories::where([['category_id','=',3],['name','=','Uncategorized']])->where('name',"!=", "Comments")->pluck('name', 'id');
        return Inertia::render('Admin/Posts/Blog/CreatePost', ['categories' => $categories, "medias" => $medias])
        ->with('page_links', collect(Cache::get('admin_page_links'))->mapToGroups(function($item, $key){
            return [boolval($item['is_parent']) && boolval($item['is_active']) ? 'parentLinks':'subLinks' => $item];
        }))
        ->with("auth.user", Auth::user()->only('name', 'email', 'roles'));
    }

    public function store(Request $request)
    {
        $this->getValidateBlog($request);

        $post = new Post();

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->short_text = $request->input('short_text');
        $post->author = $request->input('author');
        $post->subcategory_id = $request->category;
        $post->slug = $request->input('slug');
        if($request->file('image')) {
            $post->image = $this->upload($request);
             
            $media = new Media();
            $file = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($file,PATHINFO_FILENAME);
            $media->media_name = $fileName;
            
            $media->image = $post->image;
            $media->type = 'CLIENT_FILE';
            $media->save();
            
        }else if($request->from_library){
            $media = Media::where('image', $request->from_library)->firstOrFail();
            $post->image= $media->image;
            
        }else{
            $post->image= null;
        }

        $post->save();

        $request->session()->flash('success', 'New post has been added|>><<|Post created successfully!');

        return redirect()->route('blog.admin');
    }
  
    public function edit($slug)
    {
        // $post = Post::where('slug', $slug)->firstOrFail();
        return Inertia::render('Admin/Posts/Blog/EditPost', [
            'post' => Post::where('slug', $slug)->firstOrFail(),
            'categories' => Subcategories::where('name', '!=' ,'Testimonials')->where('name', '!=' ,'Comments')->pluck('name', 'id'),
            'medias' => Media::where('type','=','CLIENT_FILE')->get()->pluck('image_url', 'media_name')
        ])
        ->with('page_links', collect(Cache::get('admin_page_links'))->mapToGroups(function($item, $key){
            return [boolval($item['is_parent']) && boolval($item['is_active']) ? 'parentLinks':'subLinks' => $item];
        }))
        ->with("auth.user", Auth::user()->only('name', 'email', 'roles'));
    }

    public function update(Request $request, $slug)
    {
        $this->getValidateBlog($request, $slug);

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
            $media->type = 'CLIENT_FILE';
 
    
            $media->save();
           
        }else if(!is_null($request->from_library)){
            $media = Media::where('image', $request->from_library)->firstOrFail();
            if($media->image != $post->image){
                $post->image= $media->image;
                
            }
        }
        $post->save();

        $request->session()->flash('success', 'Post updated successfully!|>><<|'.$request->title.' has been updated.');

        return redirect()->route('blog.admin');
    }

    public function destroy(Request $request, $slug)
    {

        $post =Post::where('slug', $slug)->firstOrFail();
        
        $post->delete();
        $request->session()->flash('success', 'Post deleted!|>><<|Post deletion complete.');

        return redirect()->route('blog.admin');
    }

    public function adminPortfolio()
    {
       
        return Inertia::render('Admin/Posts/Portfolio/ShowPortfolio', [
            "posts" => Portfolio::orderBy('id', 'DESC')->paginate(15)
        ])
        ->with('page_links', collect(Cache::get('admin_page_links'))->mapToGroups(function($item, $key){
            return [boolval($item['is_parent']) && boolval($item['is_active']) ? 'parentLinks':'subLinks' => $item];
        }))
        ->with("auth.user", Auth::user()->only('name', 'email', 'roles'));
    }

    public function createPortfolio()
    {
        $medias = Media::where('type','=','CLIENT_FILE')->get()->pluck('image_url', 'media_name');
        
        $categories = Subcategories::where([['category_id','=',5],['name','=','Uncategorized']])->get()->except('name','Uncategorized')->pluck('name', 'id');
        return Inertia::render('Admin/Posts/Portfolio/CreatePortfolio', ['categories' => $categories, "medias" => $medias])
        ->with('page_links', collect(Cache::get('admin_page_links'))->mapToGroups(function($item, $key){
            return [boolval($item['is_parent']) && boolval($item['is_active']) ? 'parentLinks':'subLinks' => $item];
        }))
        ->with("auth.user", Auth::user()->only('name', 'email', 'roles'));
    }

    public function storePortfolio(Request $request)
    {
        $this->validate($request, [
            'title' => ['required'],
            'author' => 'required',
            'content' => 'required',
            'category' => 'required',
            'slug' => 'required',
            'images' => ['required','array', 'min:3'],
            'images.*' => [ 'image', 'max:1024'],
        ]);

        $post = new Portfolio();

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->author = $request->input('author');
        $post->subcategory_id = $request->category;
        $post->styled_title = $request->input('styled_title');
        $post->slug = $request->input('slug');
        if($request->file('images')) {    
            $array_img_names= array();
            $file_count = count($request->file('images'));
            foreach($request->file('images') as $key => $file)
            {
                $fileName = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);              
                if(Media::where('media_name', $fileName)->exists() != 1) {
                    $imageName = md5(uniqid()) . "." . $file->getClientOriginalExtension();
                    $file->move(public_path('rvmp-content/rvmp-uploads'), $imageName);
                    $media = new Media();
                    $media->media_name = $fileName;
                    $media->image = $imageName;
                    $media->type = 'CLIENT_FILE';
                    $media->save();
                }else{
                    $media = Media::where('media_name', $fileName)->firstOrFail();
                    $imageName= $media->image;         
                }
                    array_push($array_img_names, $imageName);
            }
            $post->images = json_encode($array_img_names, JSON_FORCE_OBJECT);
        }else{
            $post->images ='{}';
        }

        $post->save();

        // $request->session()->flash('success', 'New Portfolio has been added|>><<|Portfolio created successfully!');

        return redirect()->route('portfolio.admin')
                         ->with('success', 'New Portfolio has been added|>><<|Portfolio created successfully!');
    }
    public function editPortfolio($slug)
    {
        $medias = Media::where('type','=','CLIENT_FILE')->get()->pluck('image_url', 'media_name');
        $categories = Subcategories::where([['category_id','=',5],['name','=','Uncategorized']])->get()->pluck('name', 'id');
        return Inertia::render('Admin/Posts/Portfolio/EditPortfolio', [ 'post' => Portfolio::where('slug', $slug)->firstOrFail(),'categories' => $categories, "medias" => $medias])
        ->with('page_links', collect(Cache::get('admin_page_links'))->mapToGroups(function($item, $key){
            return [boolval($item['is_parent']) ? 'parentLinks':'subLinks' => $item];
        }))
        ->with("auth.user", Auth::user()->only('name', 'email', 'roles'));
    }
    public function updatePortfolio(Request $request, $slug)
    {
        $this->validate($request, [
            'title' => ['required'],
            'author' => 'required',
            'content' => 'required',
            'category' => 'required',
            'images' => ['required','array', 'min:3'],
            'images.*' => ['image', 'max:1024'],
        ]);

        $post = Portfolio::where('slug', $slug)->firstOrFail();

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->author = $request->input('author');
        $post->subcategory_id = $request->category;
        $post->styled_title = $request->input('styled_title');
        $post->slug = $request->input('slug');
 
        if($request->file('images')) {
  
            $array_img_names= array();
            $file_count = count($request->file('images'));
            foreach($request->file('images') as $key => $file)
            {
                    $fileName = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
                    echo "<script>console.log('".$file->getClientOriginalExtension()."')</script>";
                    if(Media::where('media_name', $fileName)->exists() != 1)                    
                    {
                    $imageName = md5(uniqid()) . "." . $file->getClientOriginalExtension();
                    $file->move(public_path('rvmp-content/rvmp-uploads'), $imageName);
                    $media = new Media();
                    $media->media_name = $fileName;
                    $media->image = $imageName;
                    $media->type = 'CLIENT_FILE';
                    $media->save();
                }else{
                    $media = Media::where('media_name', $fileName)->firstOrFail();
                    $imageName= $media->image;   
                }
                    array_push($array_img_names,$imageName);
            }
            $post->images = json_encode($array_img_names, JSON_FORCE_OBJECT);
        }else{
            $post->images ='{}';
        }

        $post->save();

        $request->session()->flash('success', 'Portfolio has been Updated|>><<|Portfolio updated successfully!');

        return redirect()->route('portfolio.admin')
                         ->with('success', 'Portfolio has been Updated|>><<|Portfolio updated successfully!');
    }   
    
    public function destroyPortfolio(Request $request, $slug)
    {

        $post =Portfolio::where('slug', $slug)->firstOrFail();
        
        $post->delete();
        $request->session()->flash('success', 'Portfolio deleted!|>><<|Portfolio deletion complete.');

        return redirect()->route('portfolio.admin')
                         ->with('success', 'Portfolio deleted!|>><<|Portfolio deletion complete.');
    }

    public function adminTestimonials()
    {
        return Inertia::render('Admin/Posts/Testimonials/ShowTestimonials', [
            "posts" => Testimonials::orderBy('id', 'DESC')->paginate(15)
        ])
        ->with('page_links', collect(Cache::get('admin_page_links'))->mapToGroups(function($item, $key){
            return [boolval($item['is_parent']) && boolval($item['is_active']) ? 'parentLinks':'subLinks' => $item];
        }))
        ->with("auth.user", Auth::user()->only('name', 'email', 'roles'));
    }
    public function createTestimonials()
    {
        $medias = Media::where('type','=','CLIENT_FILE')->get()->pluck('image_url', 'media_name');
        $categories = Subcategories::where([['category_id','=',4],['name','=','Uncategorized']])->get()->pluck('name', 'id');
        return Inertia::render('Admin/Posts/Testimonials/CreateTestimonials', ['categories' => $categories, "medias" => $medias])
        ->with('page_links', collect(Cache::get('admin_page_links'))->mapToGroups(function($item, $key){
            return [boolval($item['is_parent']) && boolval($item['is_active']) ? 'parentLinks':'subLinks' => $item];
        }))
        ->with("auth.user", Auth::user()->only('name', 'email', 'roles'));
    }
    public function storeTestimonials(Request $request)
    {
        $this->validate($request, [
            'ratings' => ['required','max:5','min:0'],
            'client_name' => 'required',
            'client_org' => 'required',
            'content' => 'required',
            'category' => 'required',
            'image' => ['nullable', 'image', 'max:1024'],
        ]);

        $post = new Testimonials();

        $post->ratings = $request->input('ratings');
        $post->content = $request->input('content');
        $post->client_name = $request->input('client_name');
        $post->subcategory_id = $request->category;
        $post->client_org = $request->input('client_org');
        $post->stars = $request->input('stars');
        if($request->file('image')) {
            $post->image = $this->upload($request);
             
            $media = new Media();
            $file = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($file,PATHINFO_FILENAME);
            $media->media_name = $fileName;
            
            $media->image = $post->image;
            $media->type = 'CLIENT_FILE';
            $media->save();
           
        }else{
            $media = Media::where('image', $request->from_library)->firstOrFail();
            $post->image= $media->image;
           
        }

        $post->save();

        return redirect()->route('testimonial.admin')
                         ->with('success', 'New Testimonial has been added|>><<|Testimonial created successfully!');
    }
    public function editTestimonials($id)
    {
        $post = Testimonials::where('id', $id)->firstOrFail();
        $subcat = Subcategories::where([['category_id','=',4],['name','=','Uncategorized']])->pluck('name', 'id');
        $media =  Media::where('type','=','CLIENT_FILE')->get()->pluck('image_url', 'media_name');
        return Inertia::render('Admin/Posts/Testimonials/EditTestimonials')
                        ->with('post', $post)
                        ->with('categories', $subcat)
                        ->with('medias',  $media)
                        ->with('page_links', collect(Cache::get('admin_page_links'))->mapToGroups(function($item, $key){
                            return [boolval($item['is_parent']) && boolval($item['is_active']) ? 'parentLinks':'subLinks' => $item];
                        }))
                        ->with("auth.user", Auth::user()->only('name', 'email', 'roles'));
    }

    public function updateTestimonials(Request $request, $id)
    {
        // dd($request);
        $this->validate($request, [
            'ratings' => ['required','max:5','min:0'],
            'client_name' => 'required',
            'client_org' => 'required',
            'content' => 'required',
            'category' => 'required',
            'image' => ['nullable', 'image', 'max:1024']
        ]);
        
        $post = Testimonials::where('id', $request->id)->firstOrFail();
         
        $post->ratings = $request->input('ratings');
        $post->content = $request->input('content');
        $post->client_name = $request->input('client_name');
        $post->subcategory_id = $request->category;
        $post->client_org = $request->input('client_org');
        $post->stars = $request->stars;
 
        if($request->file('image')) {
            $post->image = $this->upload($request);
             
            $media = new Media();
            $file = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($file,PATHINFO_FILENAME);
            $media->media_name = $fileName;
            
            $media->image = $post->image;
            $media->type = 'CLIENT_FILE';
            $media->save();
           
        }else if(is_null($request->from_library)==false){
            $media = Media::where('image', $request->from_library)->firstOrFail();
            $post->image = $media->image !== $request->from_library ? $media->image : $request->from_library;
           
        }
        $post->save();
       
        // $request->session()->flash('success', 'Testimonial updated successfully!|>><<|Testimonial #'.$request->id.' has been updated.');

        return redirect()->route('testimonial.admin')
                ->with('success', 'Testimonial updated successfully!|>><<|Testimonial #'.$request->id.' has been updated.');
    }

    public function destroyTestimonials(Request $request, $id)
    {

        $post =Testimonials::where('id', $id)->firstOrFail();
        
        $post->delete();
        $request->session()->flash('success', 'Testimonial deleted!|>><<|Testimonial deletion complete.');

        return redirect()->route('testimonial.admin');
    }
    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    private function getValidateBlog(Request $request, $id = null): void
    {
        $data = [
            'title' => 'required',
            'slug' => 'required',
            'short_text' => 'required',
            'content' => 'required',
            'category' => 'required',
            'author' => 'required',
            'image' => ['nullable', 'image', 'max:1024']

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
