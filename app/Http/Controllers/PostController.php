<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{   
    //1.index to display all records
    public function index()
    {  
        $UserPosts = Post::all(); //step 2, first make 'use' of it in global scope (if you choose it from suggestion it will created automatically )
     
        return view('posts.index',[
            'posts' => $UserPosts
        ]);
    }
    //2.(a)create to display adding new record page
    public function create()
    {
        $users = User::get();
        return view('posts.create' ,[
'users'=> $users, 
        ]);
    }

    //3.(b-saving a-2 step)Store to save this new record
    public function store()
    {
        //step 1: get me the form submission data...
            //WAY (1) of making this which get all & then choose each part
            $data = request()->all(); //insted of using $_POST 
            $title = $data['title'];
            $description = $data['description'];
            $userid = $data['posted_by'];

            // //WAY (2) of making this which get the specific part you need only
            // $title = request()->title;
            // $description = request()->description;

            // //WAY (3)
            // $data = $request()->all(); //insted of using $_POST 
            // $title = $data['title'];
            // $description = $data['description']; 
            //and in store(Request $request)

        //step 2: store(save) the form data in DB... 
        Post::create([
            'title' => $title,
            'description'=> $description,
            'user_id'=>$userid,
        ]);
        return to_route(route: 'posts.index');

    }
    


    //4.show to display specific record using id
    public function show($postId)
    {
        //$UserPost = Post::where('id',$postId)->first(); //use for more than conditions
        $UserPost = Post::find($postId); //get from DB this specific record
       
        //to return this '$UserPost' record's value to this 'posts.show' page
        return view('posts.show',[
            'post' => $UserPost
        ]);
    }

    //5.(a)edit to edit specific record using id
    public function edit($postId)
    {
        $UserPost = Post::find($postId); //get from DB this specific record
        return view('posts.edit',[
            'post' => $UserPost
        ]);
    }

    //6.(b-saving a-5 step)update to save this specific record using id
    public function update()
    {
        //smae as store (step-3)
            $data = request()->all(); //insted of using $_POST 
            $title = $data['title'];
            $description = $data['description'];
            

        //step 2: store(save) the form data in DB... 
        Post::create([
            'title' => $title,
            'description'=> $description,
        ]);
        return to_route(route: 'posts.index');
    }

    //7.destroy to delete specific record using id

    
    
}
