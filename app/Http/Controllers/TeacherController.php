<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function teacher()
    {
        $result = Result::all();
        return view('teacher',[
            'result'=>$result
        ]);
    }
}
