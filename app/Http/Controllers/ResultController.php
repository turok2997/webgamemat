<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
//    public function result()
//    {
//        $update_level=Result::where('id_user', Auth::user()->id)->where('end', 0)->update(['end' => 1]);
//        $update_level1=User::where('id', Auth::user()->id)->update(['currentlevel' => 'lvl-1']);
//        $results = Result::where('id_user', Auth::user()->id)->get();
//        return view('result',[
//            'result'=>$results
//        ]);
//    }
    public function result_view()
    {
        $results = Result::where('id_user', Auth::user()->id)->where('end', 1)->get();
        return view('result',[
            'result'=>$results
        ]);
    }



}
