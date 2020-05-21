<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Counter;

class CounterController extends Controller
{
    public function modify(Request $request) { 
        $counterType = $request->counterType;
        // Need to set like dislike cookie for the root domain since it's a multilanguage website...
        return Counter::up($counterType);
    }
}
