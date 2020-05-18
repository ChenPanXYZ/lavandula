<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;

use Response;

class AdminPageController extends Controller
{
    //public Language $language = new Language();
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function showResumeAdmin()
    {
        $language = new Language();
        $visitorNumber = get_counter_number('visitor');
        $feedback = $language->init($visitorNumber);
        if(!($feedback === 0)) {
            return redirect($feedback);
        }
        else {
            return view('dashboard', ["languageCode" => $language->getLanguageCode(), "domain"=>$language->getDomain(), "languageUrls" => $language->getLanguageUrls(), "resume" => \App\Resume_Section::getAll()]);
        }
    }

    public function showCommentsAdmin()
    {
        $language = new Language();
        $visitorNumber = get_counter_number('visitor');
        $feedback = $language->init($visitorNumber);
        if(!($feedback === 0)) {
            return redirect($feedback);
        }
        else {
            return view('dashboard-comments', ["languageCode" => $language->getLanguageCode(), "domain"=>$language->getDomain(), "languageUrls" => $language->getLanguageUrls()]);
        }
    }
}
