<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\Row;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LevelController extends Controller
{
  public function level(Request $request)
  {
      $currentlevel = User::where('id', Auth::user()->id)->get();
      $number_row = Level::where('slug', $currentlevel[0]->currentlevel)->get();


      $input = $request->all();
      $keys = array_keys($input);
      if($input['currentlevel']!=$currentlevel[0]->currentlevel) return  redirect()->route('level',  $input['currentlevel']);
        $result=0;
      for ($i = 1; $i <= $number_row[0]->quantity_row; $i++) {
          $row = Row::where('id', $keys[$i])->get();
//          global $result;
//          static $result=0;
          if ($row[0]->convergence!=$input[$keys[$i]]){

//              return  redirect()->route('level',  $currentlevel[0]->currentlevel);
          }
          else{
              $result+=1;
          }
      }
      $res=Result::where('id_user', Auth::user()->id)->where('end', 0)->get();
      $main_result=Result::where('id_user', Auth::user()->id)->where('end', 0)->update(['points' => $res[0]->points+$result]);

      $id_level=$number_row[0]->id+1;
      $level_slug = Level::where('id', $id_level)->get();
      if($level_slug[0]->slug=='end-lvl') return  redirect()->route('result');
      $update_level = User::where('id', Auth::user()->id)->update(['currentlevel' => $level_slug[0]->slug]);
      $currentlevel = User::where('id', Auth::user()->id)->get();
      return  redirect()->route('level',  $currentlevel[0]->currentlevel);
  }

  }

