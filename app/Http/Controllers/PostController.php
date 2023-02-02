<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
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
    public function store(StorePostRequest $request)
    {

       $request->validate([
            'title'=>['unique:posts,title'],
        ]);




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
        
        $users = User::get();
        $UserPost = Post::find($postId);
        return view('posts.edit',[
            'users'=> $users, 
            'post' => $UserPost
        ]);
    }

    //6.(b-saving a-5 step)update to save this specific record using id
    public function update(StorePostRequest $request ,$postId)
    {

       
        

        $UserPost = Post::find($postId);
        
        // if(!$UserPost){
        //     return to_route(route: 'posts.index');
        // }else{
        //     $postId->update([
        //         'title'=>request()->title,
        //         'description'=>request()->description,
        //         'user_id' =>request()->user_id
                
        //     ]);
        //     return to_route(route: 'posts.index');
        // } 
       

        // //smae as store (step-3)
        //  //insted of using $_POST 
        // 
        // $data = request()->all();
        // $UserPost['title'] = ;
        // $description = $data['description'];
        // $userid = $data['posted_by'];
        // $users = User::get();
        
        $data = request()->all(); 
        $UserPost->title = $data['title'];
        $UserPost->description = $data['description'];
        $UserPost->user_id =$data['posted_by'];
        $UserPost->save();

        // $data = request()->all(); 
        // $UserPost->title = request()->title;
        // $UserPost->description = request()->description;
        // $UserPost->user_id = request()->posted_by;
        // $UserPost->save();

        // $title = request()->title;
        // $UserPost->title = $title;
        // $UserPost->save();
            // $description = request()->description;

            // $data = request()->all(); //insted of using $_POST 
            // $title = $data['title'];
            // $description = $data['description'];
            // $userid = $data['posted_by'];

            // Post::save([
            //     'title' => $title,
            //     'description'=> $description,
            //     'user_id'=>$userid,
            // ]);


        // $title = request()->title;
        // $description = request()->description;
        // $userid = request()->userid;
        //step 2: store(save) the form data in DB... 
        // $postId -> update([
        //     'title' => $title,
        //     'description'=> $description,
        //     'user_id'=>$userid,
        // ]);
        return to_route(route: 'posts.index');
    }

    //7.destroy to delete specific record using id
    public function destroy($postId)
    {

      
        



        $UserPost = Post::find($postId); 
    
        $UserPost -> delete();
        return to_route('posts.index' , [
            'confirmation' => $UserPost
        ] );
    }
}
