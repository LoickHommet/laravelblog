<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(){
        return view('contact');
    }
    public function send(Request $request){
        $paramas = $request->all();

        Mail::to('admin@gmail.com')
            ->send(new ContactMail($paramas));
        return back();

    }
}
