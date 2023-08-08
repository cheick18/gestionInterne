<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test extends Controller
{
    //
    public function Test(){
        $a = 1;
        return response()->json($a);
    }
}
