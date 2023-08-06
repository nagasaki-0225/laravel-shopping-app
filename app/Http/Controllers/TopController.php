<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{    
    public function home(){
        return view('top');
    }

    public function test(){
        return view('test');
    }

    public function rist() {        
        return view('list');
        }
    //
}
