<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use App\Counter;
use App\Comment;

use Response;

class PublicPageController extends Controller
{
    
    public function showHomepage()
    {
        $language = new Language();
        $visitorNumber = Counter::getData('visitor');
        $likeNumber = Counter::getData('like');
        $dislikeNumber = Counter::getData('dislike');
        $feedback = $language->init($visitorNumber);

        $opts = array(
            'http'=>array(
              'method'=>"GET"
            )
          );
          
          $context = stream_context_create($opts);
          
          // Open the file using the HTTP headers set above
          $comments = json_decode(file_get_contents('https://www.chen.life/wp-json/wp/v2/comments/?post=231&parent=0', false, $context));

        //$comments = Comment::getProvedByTime();
        if(!($feedback === 0)) {
            return redirect($feedback);
        }
        else {
            return view('homepage-components/homepage', ["languageCode" => $language->getLanguageCode(), "domain"=>$language->getDomain(), "languageUrls" => $language->getLanguageUrls(), "resume" => \App\Resume_Section::getAll(), "likeNumber" => $likeNumber, "dislikeNumber" => $dislikeNumber, "visitorNumber" => $visitorNumber, "comments" =>$comments, "commentsNumber" => 6]);
        }
    }

    public function showGuestbook()
    {
        $language = new Language();
        $visitorNumber = Counter::getData('visitor');
        $likeNumber = Counter::getData('like');
        $dislikeNumber = Counter::getData('dislike');
        $feedback = $language->init($visitorNumber);

        $feedback = $language->init($visitorNumber);

        $comments = Comment::getProvedByTime();
        if(!($feedback === 0)) {
            return redirect($feedback);
        }
        else {
            return view('guestbook-components/guestbook', ["languageCode" => $language->getLanguageCode(), "domain"=>$language->getDomain(), "languageUrls" => $language->getLanguageUrls(), "likeNumber" => $likeNumber, "dislikeNumber" => $dislikeNumber, "visitorNumber" => $visitorNumber, "comments" =>$comments, "commentsNumber" => -1]);
        }
    }


    public function showHistory()
    {
        $language = new Language();
        $visitorNumber = Counter::getData('visitor');
        $likeNumber = Counter::getData('like');
        $dislikeNumber = Counter::getData('dislike');
        $feedback = $language->init($visitorNumber);

        $feedback = $language->init($visitorNumber);

        $comments = Comment::getProvedByTime();
        if(!($feedback === 0)) {
            return redirect($feedback);
        }
        else {
            return view('history-components/history', ["languageCode" => $language->getLanguageCode(), "domain"=>$language->getDomain(), "languageUrls" => $language->getLanguageUrls(), "likeNumber" => $likeNumber, "dislikeNumber" => $dislikeNumber, "visitorNumber" => $visitorNumber, "comments" =>$comments, "commentsNumber" => -1]);
        }
    }

    public function showResume()
    {
        $language = new Language();
        $visitorNumber = Counter::getData('visitor');
        $likeNumber = Counter::getData('like');
        $dislikeNumber = Counter::getData('dislike');
        $feedback = $language->init($visitorNumber);
        if(!($feedback === 0)) {
            return redirect($feedback);
        }
        else {
            return view('resume-components/resume', ["languageCode" => $language->getLanguageCode(), "domain"=>$language->getDomain(), "languageUrls" => $language->getLanguageUrls(), "resume" => \App\Resume_Section::getAll(), "likeNumber" => $likeNumber, "dislikeNumber" => $dislikeNumber, "visitorNumber" => $visitorNumber]);
        }
    }

    public function show404Page() {
        $language = new Language();
        $visitorNumber = Counter::getData('visitor');
        $likeNumber = Counter::getData('like');
        $dislikeNumber = Counter::getData('dislike');
        $feedback = $language->init($visitorNumber);
        if(!($feedback === 0)) {
            return redirect($feedback);
        }
        else {
            return Response::view('errors.404', ["languageCode" => $language->getLanguageCode(), "domain"=>$language->getDomain(), "languageUrls" => $language->getLanguageUrls(), "likeNumber" => $likeNumber, "dislikeNumber" => $dislikeNumber, "visitorNumber" => $visitorNumber], 404);
        }
    }
}
