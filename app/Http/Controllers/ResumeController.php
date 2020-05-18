<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Resume_Section;
use App\Resume_Section_Item;
use App\Resume_Section_Item_Detail;


class ResumeController extends Controller
{
    public function add(Request $request) {
        switch ($request->type) {
            case 0:
                Resume_Section::add($request);
                break;
            case 1:
                Resume_Section_Item::add($request);
                break;
            case 2:
                Resume_Section_Item_Detail::add($request);
                break;
        }
    }

    public function delete(Request $request) {
        switch ($request->type) {
            case 0:
                Resume_Section::remove($request);
                break;
            case 1:
                Resume_Section_Item::remove($request);
                break;
            case 2:
                Resume_Section_Item_Detail::remove($request);
                break;
        }
    }


    public function update(Request $request) {
        if($request->has('resumeSectionCheckbox')) 
        {
            Resume_Section::modify($request);
        } 
        if($request->has('resumeSectionItemCheckbox')) {
            Resume_Section_Item::modify($request);
        } 
        
        
        if($request->has('resumeSectionItemContentCheckbox')) {
            Resume_Section_Item_Detail::modify($request);
        } 
    }
}
