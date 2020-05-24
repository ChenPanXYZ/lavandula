<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use App\Counter;
use App\Comment;


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
        $visitorNumber = Counter::getData('visitor');
        $feedback = $language->init($visitorNumber);
        if(!($feedback === 0)) {
            return redirect($feedback);
        }
        else {
            return view('dashboard-components/dashboard', ["languageCode" => $language->getLanguageCode(), "domain"=>$language->getDomain(), "languageUrls" => $language->getLanguageUrls(), "resume" => \App\Resume_Section::getAll()]);
        }
    }

    public function showCommentsAdmin()
    {
        $language = new Language();
        $visitorNumber = Counter::getData('visitor');
        $feedback = $language->init($visitorNumber);
        $approvedComments = Comment::getProvedByTime();
        $unapprovedComments = Comment::getUnprovedByTime();
        if(!($feedback === 0)) {
            return redirect($feedback);
        }
        else {
            return view('dashboard-components/dashboard-comments', ["languageCode" => $language->getLanguageCode(), "domain"=>$language->getDomain(), "languageUrls" => $language->getLanguageUrls(), "approvedComments" => $approvedComments, "unapprovedComments" => $unapprovedComments]);
        }
    }
}
