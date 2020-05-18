<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Counter;

class CounterController extends Controller
{
    public function modify(Request $request) {

        $domain = $_SERVER['HTTP_HOST'];
        if (substr($domain, 0, 4) == 'www.') 
        {
            $domain = substr($_SERVER['HTTP_HOST'], 4);
        } 
        
        else if (in_array(substr($domain, 0, 3), array('cn.', 'tw.'))) 
        {
            $domain = substr($_SERVER['HTTP_HOST'], 3);
        }
    
        $counterType = $request->counterType;
        // Need to set like dislike cookie for the root domain since it's a multilanguage website...
        
        if (isset($_COOKIE['like-dislike']) === false) {
            return Counter::up($counterType, $domain);
        }
        else {
            return 1;
        }

    }
}
