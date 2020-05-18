<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

class CommentController extends Controller
{
    //
    public function add(Request $request){
        if (Comment::add($request) == 200) {
            return view('thankyou', ["name" => $request->name]);
        }
        else {
            return -1;
        }
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
