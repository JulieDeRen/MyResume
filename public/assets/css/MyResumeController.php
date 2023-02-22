<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyResumeController extends Controller
{
    public function index(){
        return view('index');
    }
    public function portfoliodetails(Request $request){
        return view('portfoliodetails' .'/' . $request);
    }
    public function article(){
        return view('article');
    }
    public function contact(){
        return view('contact');
    }
    public function contactForm(Request $request){
        // return $request -> name;
        // return $request;
        return view('contact', ['data'=>$request]);
    }
}