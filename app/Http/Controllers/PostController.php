<?php


namespace App\Http\Controllers;

use App\Models\Postimage;
use App\Http\Requests\StorePostRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
class PostController extends Controller
{   
    // use Sluggable;
    // public function sluggable(){
    //     return [
    //         'slug' => [
    //              'source'             => 'title',
    //              'separator'          => '-',
    //              'unique'             => true,
    //              'onUpdate'           => true,
    //              'includeTrashed'     => false,
    //         ]
    //     ];
    // }

    public function index()
    {         
        $UserPosts = Post::paginate(6);
        Paginator::useBootstrapFour();

        return view('posts.index',[
            'posts' => $UserPosts             
        ]);
    }

    public function create()
    {
        $users = User::get();

        return view('posts.create' ,[
            'users'=> $users, 
        ]);
    }

    public function store(StorePostRequest $request)
    {
       $request->validate([
            'title'=>['unique:posts,title'],
        ]);

        $data = request()->all();
        $title = $data['title'];
        $description = $data['description'];
        $userid = $data['posted_by'];
        $image=$data['image'];

        //trial form img
        // $file = request()->file('image')->store('image');
        // $postImage = $request->file('image');
        //     $file = $postImage->store('images');
        // $image_path = null;
        // if($request->hasFile('image')) {
        //     $postImage = $request->file('image');
        //     $image_path = $postImage->store('images');
        // }
        // if($request->file('image')){
        //     $file= $request->file('image');
        //     $filename = $file->store('images');
        //     $data['image']= $filename;
        // }
        
        Post::create([
            'title' => $title,
            'description'=> $description,
            'user_id'=>$userid,
            'image'=>$image,   
        ]);

        return to_route(route: 'posts.index');
    }

    public function show($postId)
    {
        $UserPost = Post::find($postId); //get from DB this specific record
        $UserComment = Comment::where('post_id', $postId)->get();
       
        return view('posts.show',[
            'post' => $UserPost,
            'comments' => $UserComment ,
        ]);
    }

    public function edit($postId)
    {
        $users = User::get();
        $UserPost = Post::find($postId);

        return view('posts.edit',[
            'users'=> $users, 
            'post' => $UserPost
        ]);
    }

    public function update(StorePostRequest $request ,$postId)
    {
        $UserPost = Post::find($postId);
        $data = request()->all(); 

        if($request->hasFile('image')) {
            Storage::delete($UserPost->image_path);
            $postImage = $request->file('image');
            $image_path = $postImage->store('images');
            $UserPost->image_path = $image_path;
        }elseif(isset($request->delete_image)) {
            Storage::delete($UserPost->image_path);
            $image_path = '';
            $UserPost->image_path = $image_path;
        }       

        $UserPost->title = $data['title'];
        $UserPost->description = $data['description'];
        $UserPost->user_id =$data['posted_by'];
        $UserPost->save();

        return to_route(route: 'posts.index');
    }

    //7.destroy to delete specific record using id
    public function destroy($postId)
    {
        $UserPost = Post::find($postId); 
    
        
        $postComments = Comment::where('post_id', $postId)->get();
        $postComments->each->delete();

        // Storage::delete($UserPost->image_path);
        $UserPost -> delete();
        return to_route('posts.index' , [
            'confirmation' => $UserPost
        ] );
    }
}
