<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ResumeSection;
use App\ResumeSectionItem;
use App\ResumeSectionItemDetail;


class ResumeController extends Controller
{
    public function add(Request $request) {
        switch ($request->type) {
            case 0:
                ResumeSection::add($request);
                break;
            case 1:
                Resume_Section_Item::add($request);
                break;
            case 2:
                ResumeSectionItemDetail::add($request);
                break;
        }
    }

    public function delete(Request $request) {
        switch ($request->type) {
            case 0:
                ResumeSection::remove($request);
                break;
            case 1:
                ResumeSectionItem::remove($request);
                break;
            case 2:
                ResumeSectionItemDetail::remove($request);
                break;
        }
    }


    public function update(Request $request) {
        if($request->has('resumeSectionCheckbox')) 
        {
            ResumeSection::modify($request);
        } 
        if($request->has('resumeSectionItemCheckbox')) {
            ResumeSectionItem::modify($request);
        } 
        
        
        if($request->has('resumeSectionItemContentCheckbox')) {
            ResumeSectionItemDetail::modify($request);
        } 
    }
    public function getAll(Request $request) {
        return ResumeSection::getAll();
    }
}
