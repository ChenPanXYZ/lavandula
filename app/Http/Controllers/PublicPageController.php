<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use App\Counter;

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
        if(!($feedback === 0)) {
            return redirect($feedback);
        }
        else {
            return view('homepage', ["languageCode" => $language->getLanguageCode(), "domain"=>$language->getDomain(), "languageUrls" => $language->getLanguageUrls(), "resume" => \App\Resume_Section::getAll(), "likeNumber" => $likeNumber, "dislikeNumber" => $dislikeNumber, "visitorNumber" => $visitorNumber]);
        }
    }

    public function showGuestbook()
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
            return view('guestbook', ["languageCode" => $language->getLanguageCode(), "domain"=>$language->getDomain(), "languageUrls" => $language->getLanguageUrls(), "likeNumber" => $likeNumber, "dislikeNumber" => $dislikeNumber, "visitorNumber" => $visitorNumber]);
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
            return view('resume', ["languageCode" => $language->getLanguageCode(), "domain"=>$language->getDomain(), "languageUrls" => $language->getLanguageUrls(), "resume" => \App\Resume_Section::getAll(), "likeNumber" => $likeNumber, "dislikeNumber" => $dislikeNumber, "visitorNumber" => $visitorNumber]);
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
