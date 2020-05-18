<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Counter extends Model
{
    protected $table = 'counters';
    protected $primaryKey = 'counter_id';
    protected $fillable = [
        'counter_type', 
        'counter_value',
    ];
    public $timestamps = false;

    public static function up(String $counterType, String $domain) {
        Counter::where('counter_type', $counterType)->increment('counter_value', 1);
        setcookie("like-dislike", $counterType, time() + (86400), "/", $domain);
        return "thank you for your feedback!";
    }
    // public static function decrement(Request $request) {

    // }
}
