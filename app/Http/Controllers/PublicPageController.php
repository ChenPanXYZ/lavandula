<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;

use Response;

class PublicPageController extends Controller
{
    //public Language $language = new Language();
    
    public function showHomepage()
    {
        $language = new Language();
        $visitorNumber = get_counter_number('visitor');
        $feedback = $language->init($visitorNumber);
        if(!($feedback === 0)) {
            return redirect($feedback);
        }
        else {
            return view('homepage', ["languageCode" => $language->getLanguageCode(), "domain"=>$language->getDomain(), "languageUrls" => $language->getLanguageUrls(), "resume" => \App\Resume_Section::getAll()]);
        }
    }

    public function showGuestbook()
    {
        $language = new Language();
        $visitorNumber = get_counter_number('visitor');
        $feedback = $language->init($visitorNumber);
        if(!($feedback === 0)) {
            return redirect($feedback);
        }
        else {
            return view('guestbook', ["languageCode" => $language->getLanguageCode(), "domain"=>$language->getDomain(), "languageUrls" => $language->getLanguageUrls()]);
        }
    }

    public function showResume()
    {
        $language = new Language();
        $visitorNumber = get_counter_number('visitor');
        $feedback = $language->init($visitorNumber);
        if(!($feedback === 0)) {
            return redirect($feedback);
        }
        else {
            return view('resume', ["languageCode" => $language->getLanguageCode(), "domain"=>$language->getDomain(), "languageUrls" => $language->getLanguageUrls(), "resume" => \App\Resume_Section::getAll()]);
        }
    }

    public function show404Page() {
        $language = new Language();
        $visitorNumber = get_counter_number('visitor');
        $feedback = $language->init($visitorNumber);
        if(!($feedback === 0)) {
            return redirect($feedback);
        }
        else {
            return Response::view('errors.404', ["languageCode" => $language->getLanguageCode(), "domain"=>$language->getDomain(), "languageUrls" => $language->getLanguageUrls()], 404);
        }
    }
}
