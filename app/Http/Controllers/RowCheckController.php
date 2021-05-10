<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Result;
use App\TestResult;
use App\Models\Row;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RowCheckController extends Controller
{
    public function RowCheck(Request $request)
    {
        $pattern = Row::inRandomOrder()->limit(3)->get();
        for($i=1;$i<=3;$i++){
            if($pattern[$i-1]->bl_a!=0) {
                while( in_array ($a = random_int($pattern[$i-1]->bl_a,$pattern[$i-1]->tl_a), array(0) ) );
                if($a<0) $a=-$a;
                $change=str_replace('$a', $a, $pattern[$i-1]->pattern);
            }
            if($pattern[$i-1]->bl_b!=0) {
                while( in_array ($b = random_int($pattern[$i-1]->bl_b,$pattern[$i-1]->tl_b), array(0) ) );
                if($b<0) $b=-$b;
                $change=str_replace('$b', $b, $change);
            }
            if($pattern[$i-1]->bl_c!=0){
                while( in_array ($c= random_int($pattern[$i-1]->bl_c,$pattern[$i-1]->tl_c), array(0) ) );
                if($c<0) $c=-$c;
                $change=str_replace('$c', $c, $change);
            }
            if($pattern[$i-1]->bl_d!=0){
                while( in_array ($d= random_int($pattern[$i-1]->bl_d,$pattern[$i-1]->tl_d), array(0) ) );
                if($d<0) $d=-$d;
                $change=str_replace('$d', $d, $change);
            }
            if($pattern[$i-1]->bl_e!=0){
                while( in_array ($e= random_int($pattern[$i-1]->bl_e,$pattern[$i-1]->tl_e), array(0) ) );
                if($e<0) $e=-$e;
                $change=str_replace('$e', $e, $change);
            }
            $pattern[$i-1]->pattern=$change;
        }
        return view('testRow',[
            'number_row'=>3,
            'pattern'=>$pattern,
        ]);
    }

    public function RowCheckAjax(Request $request)
    {
        $input = $request->all();
        $keys = array_keys($input);
        $result=0;
        $err=array();
        for ($i = 1; $i <= 3; $i++) {
            $row = Row::where('id', $keys[$i])->get();
            if ($row[0]->convergence!=$input[$keys[$i]]){
            $err[$i]=0;
            }
            else{
                $result+=1;
                $err[$i]=1;
            }
        }
        if(TestResult::where('id_user', Auth::user()->id)->exists()){
        $res=TestResult::where('id_user', Auth::user()->id)->get();
        $test_result=TestResult::where('id_user', Auth::user()->id)->update(['points' => $res[0]->points+$result]);
        }
        else{
                 $test_result = TestResult::create([
                     'id_user' => Auth::user()->id,
                     'points'=> $result,
                 ]);
        }
        return response($err);

    }

}
