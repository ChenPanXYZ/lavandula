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

        $comments = Comment::getProvedByTime();
        if(!($feedback === 0)) {
            return redirect($feedback);
        }
        else {
            return view('homepage-components/homepage', ["languageCode" => $language->getLanguageCode(), "domain"=>$language->getDomain(), "languageUrls" => $language->getLanguageUrls(), "resume" => \App\ResumeSection::getAll(), "likeNumber" => $likeNumber, "dislikeNumber" => $dislikeNumber, "visitorNumber" => $visitorNumber, "comments" =>$comments, "commentsNumber" => 6]);
        }
    }

    // public function showGuestbook()
    // {
    //     $language = new Language();
    //     $visitorNumber = Counter::getData('visitor');
    //     $likeNumber = Counter::getData('like');
    //     $dislikeNumber = Counter::getData('dislike');
    //     $feedback = $language->init($visitorNumber);

    //     $feedback = $language->init($visitorNumber);

    //     $comments = Comment::getProvedByTime();
    //     if(!($feedback === 0)) {
    //         return redirect($feedback);
    //     }
    //     else {
    //         return view('guestbook-components/guestbook', ["languageCode" => $language->getLanguageCode(), "domain"=>$language->getDomain(), "languageUrls" => $language->getLanguageUrls(), "likeNumber" => $likeNumber, "dislikeNumber" => $dislikeNumber, "visitorNumber" => $visitorNumber, "comments" =>$comments, "commentsNumber" => -1]);
    //     }
    // }


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
            return view('resume-components/resume', ["languageCode" => $language->getLanguageCode(), "domain"=>$language->getDomain(), "languageUrls" => $language->getLanguageUrls(), "resume" => \App\ResumeSection::getAll(), "likeNumber" => $likeNumber, "dislikeNumber" => $dislikeNumber, "visitorNumber" => $visitorNumber]);
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
