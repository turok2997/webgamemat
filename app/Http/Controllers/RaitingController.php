<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\TestResult;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RaitingController extends Controller
{
    public function raiting()
    {

        $res=Result::where('end', 1)->get();
$res1=array();
        foreach($res as $rest) {
            $res1[$rest->id] = array(
                'id_user' => Result::find($rest->id_user)->result,
                'points' => $rest->points,
                'time1' => Carbon::parse($rest->updated_at)->diff(Carbon::parse($rest->created_at))->format('Дни: %D Часы: %H  Минуты: %I  Секунды: %S '),
            );
        }
        $res1 = collect($res1)->sortBy([
            ['points', 'desc'],
            ['time1', 'asc'],
        ]);

        $test=TestResult::get();
        foreach($test as $tests) {
            $ress=TestResult::find($tests->id_user)->result;
            $test_res[$tests->id] = array(
                'id_user' => $ress,
                'points' => $tests->points,
            );
        }
        $test_res = collect($test_res)->sortBy([
            ['points', 'desc'],
        ]);

        return view('raiting',[
            'res'=>$res1,
            'test'=>$test_res
        ]);


    }
}
