<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'comment_id';
    protected $fillable = [
        'comment_author', 
        'comment_email',
        'comment_content',
        'comment_approved',
        'comment_date',
        'comment_date_gmt',
    ];
    public $timestamps = false;

    public static function add(Request $request) {
        return 200;
        // $name = $request->name;
        // $email = $request->email;
        // $content = $request->content;
        // $recaptchaResponse = $request->recaptchaResponse;
        
        // $secretKey = "6Le3GbwUAAAAAFM3PJKOa6HtlzcbGkEHMCGRmK18";
        // // post request to server
        // $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($recaptchaResponse);
        // $response = file_get_contents($url);
        // $responseKeys = json_decode($response,true);
        
        
        // if($responseKeys["success"]) {

        //     $comment = new Comment();
        //     $comment->comment_author = $name;
        //     $comment->comment_email = $email;
        //     $comment->comment_content = $content;
        //     $comment->comment_date = DB::raw('CURRENT_TIMESTAMP');
        //     $comment->comment_date_gmt = DB::raw('UTC_TIMESTAMP');

        //     $comment->save();
    
    
        //     if($comment) {
        //         $content = nl2br($content);
        //         $to = 'pan@panchen.xyz';
        //         $subject = $name . ' leaves a message!';
        //         $message = $name . " leaves a message: \n" . $content;
        //         mail($to, $subject, $message);
        //         return 200;
        //     }
        //     return 200;
        // }
        // else {
        //     return -1;
        // }
    }
    public static function remove(Request $request) {
        if($request->has('comments')) 
        {
            Comment::remove($request);
        } 
    }
    public static function modify(Request $request) {
        $comments = $request->comments;
        $status = $request->status;

        foreach ($comments as $comment_id) 
        {
            Comment::where('comment_id', $comment_id)
            ->update(['comment_approved' => $status]);
        }
    }


    public static function getProvedByTime() {
        $comments = Comment::where('comment_approved', 't')
        ->orderBy('comment_id', 'desc')
        ->get();
        return $comments;
    }

    public static function getUnprovedByTime() {
        $comments = Comment::where('comment_approved', 'f')
        ->orderBy('comment_id', 'desc')
        ->get();
        return $comments;
    }
}
