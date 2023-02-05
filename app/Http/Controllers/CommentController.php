<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function show($commentId)
    {
        // $UserComment = Comment::find($commentId); //get from DB this specific record
        // // dd($UserComment);
        // // return view('posts.show',[
        // //     'comment' =>$UserComment,
        // // ]);
    }


    public function store(Request $request)
    {

    //    $request->validate([
    //         'title'=>['unique:posts,title'],
    //         // 'image' => ['mimes:jpeg,png'],
    //     ]);

            $data = request()->all(); //insted of using $_POST 
            // dd($data);
            $comment = $data['comment_body'];
            // $file_path = $data['file_path'];
            $post_id = $data['post_id'];
            // $user_id = $data['user_id'];
            // $image = $data['image'];
            // $userid = $data['posted_by'];

        Comment::create([
            'comment_body' => $comment,
            // 'file_path'=> $file_path,
            'post_id'=>$post_id,
            'user_id'=> Auth::user()->id,
        ]);
        return redirect()->route('posts.show', $post_id);
        // return redirect()->route('posts.show' , $request->$data['post_id']);
        // to_route(route: 'posts.show' , $request->$post_id);

    }
    public function destroy($commentId)
    {

        $UserComment = Comment::find($commentId);
        
        if(!$UserComment) {
            return to_route(route: 'posts.index');
        }
        
        $post_id = $UserComment['post_id'];
        $UserComment->delete();

        return redirect()->route('posts.show', $post_id);

    }
}
