<?php

namespace App\Http\Controllers;


use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class AboutController extends Controller

{

    public function __construct()
    {

        $this->middleware("auth");
    }

    //
    public function index(){


        return view('AboutPage.index');
    }
    public function create(){

        return view("AboutPage.contact");

    }
    public function store(Request $request){
        $r=$request->input('name');
        Mail::send('emails.contact',['name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'user_message'=>$request->input('message')],function($me){
                $me->from("az.ahmadi1994@gmail.com");
                $me->to("az.ahmadi1994@gmail.com",'admin')->subject("test");
            }


        );




    return redirect('contact')->with('message', 'Thanks for contacting us!'.$r);
    }
}
