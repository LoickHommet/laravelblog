<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function test(){

        $loading = true;
       return view('test', compact('loading'));

    //   return view('test')
    //   ->with('load',$loading);
    }
}
