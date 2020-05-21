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

    public static function up(String $counterType) {
        Counter::where('counter_type', $counterType)->increment('counter_value', 1);
        return "thank you for your feedback!";
    }

    public static function getData(String $counterType) {
        $results = DB::table('counters')
        ->select(DB::raw('counter_value'))
        ->where('counter_type', '=', $counterType)
        ->get();
        $visitorNumber = 0;
    
        if (count($results) > 0) {
            foreach ($results as $result) {
                $visitorNumber = $result->counter_value;
            }
        }
        return $visitorNumber;
    }

}
