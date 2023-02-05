<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $data = request()->all(); //insted of using $_POST 
        $comment = $data['comment_body'];
        $post_id = $data['post_id'];
        Comment::create([
            'comment_body' => $comment,
            'post_id'=>$post_id,
            'user_id'=> Auth::user()->id,
        ]);
        return redirect()->route('posts.show', $post_id);
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
