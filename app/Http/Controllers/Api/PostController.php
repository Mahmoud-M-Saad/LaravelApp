<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {  
        $UserPosts = Post::all();
        return PostResource::collection($UserPosts);
    }

    public function show($postId)
    {  
        $UserPost = Post::findOrFail($postId);
        return new PostResource($UserPost);
    }

    public function store(StorePostRequest $request)
    {
        $request->validate(['title'=>['unique:posts,title']]);
        $data = request()->all();
        $title = $data['title'];
        $description = $data['description'];
        $userid = $data['posted_by'];

        $post = Post::create([
            'title' => $title,
            'description'=> $description,
            'user_id'=>$userid,
        ]);
        return $post;

        
    }
}
