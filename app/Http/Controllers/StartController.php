<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Row;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Result;

class StartController extends Controller
{
    public function start(){
        $user_id = User::where('id',Auth::user()->id)->get();
        $number_row = Level::where('slug', $user_id[0]->currentlevel)->get();
        if(Result::where('id_user', Auth::user()->id)->exists()){
            $end_test=Result::where('id_user', Auth::user()->id)->get();

            return view('start',[
                'currentlevel'=>$user_id[0]->currentlevel,
                'end_test'=>$end_test[0]->end

            ]);
        }
        else{
            $end_test=2;
            return view('start',[
                'currentlevel'=>$user_id[0]->currentlevel,
                'end_test'=>$end_test

            ]);
        }


    }

    public function begin(){
        $currentlevel = 'lvl-1';
        $update_level = User::where('id', Auth::user()->id)->update(['currentlevel' => $currentlevel]);
        $number_row = Level::where('slug', $currentlevel)->get();
        $result=Result::where('id_user', Auth::user()->id)->where('end', 0)->delete();
        $update_result = Result::create([
            'id_user' => Auth::user()->id,
            'points'=> 0,
            'end'=> 0,
        ]);

// Строка со сложностью       $pattern = Row::where('difficulty', $number_row[0]->difficulty)->inRandomOrder()->limit($number_row[0]->quantity_row)->get();
        $pattern = Row::inRandomOrder()->limit($number_row[0]->quantity_row)->get();
        for($i=1;$i<=$number_row[0]->quantity_row;$i++){
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
        $id_level=$number_row[0]->id+1;
        $level_slug = Level::where('id', $id_level)->get();
        return view('layouts.level',[
            'number_row'=>$number_row,
           'pattern'=>$pattern,
            'currentlevel'=>$currentlevel,
        ]);
    }


    public function continue(){
        $user_id = User::where('id',Auth::user()->id)->get();
        if($user_id[0]->currentlevel=='lvl-1'){
            $result=Result::where('id_user', Auth::user()->id)->where('end', 0)->delete();
            $update_result = Result::create([
                'id_user' => Auth::user()->id,
                'points'=> 0,
                'end'=> 0,
            ]);
        }
        $number_row = Level::where('slug', $user_id[0]->currentlevel)->get();
//  Строка со сложностью        $pattern = Row::where('difficulty', $number_row[0]->difficulty)->inRandomOrder()->limit($number_row[0]->quantity_row)->get();
        $pattern = Row::inRandomOrder()->limit($number_row[0]->quantity_row)->get();
        for($i=1;$i<=$number_row[0]->quantity_row;$i++){
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
        return view('layouts.level',[
            'number_row'=>$number_row,
            'pattern'=>$pattern,
            'currentlevel'=>$user_id[0]->currentlevel
        ]);

    }

    public function redirect(){
        $user_id = User::where('id',Auth::user()->id)->get();
        return  redirect()->route('level', $user_id[0]->currentlevel);
    }

  }
