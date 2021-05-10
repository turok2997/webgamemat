<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstrController extends Controller
{
    public function instr(Request $request)
    {
        return view('instr');
    }
}
