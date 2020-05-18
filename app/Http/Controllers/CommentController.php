<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

class CommentController extends Controller
{
    //
    public function add(Request $request){
        Comment::add($request);
    }

    public function delete(Request $request){
        $comments = $request->comments;
        $status = $request->status;

        foreach ($comments as $comment_id) 
        {
            $comment = Comment::find($comment_id);

            $comment->delete();
        }
    }

    public function modify(Request $request) {
        if($request->has('comments')) 
        {
            Comment::modify($request);
        } 
    }
}
