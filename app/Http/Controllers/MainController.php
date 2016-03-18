<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Auth;
class MainController extends Controller
{

   public function home(){
       if (Auth::check()){
           $user = Auth::user();
           return view('home')->with(compact('user'));
       }
       else{
           return redirect('/login');
       }
   }

    public function build(){
        if (Auth::check()){
            $user = Auth::user();
            return view('builder')->with(compact('user'));
        }
        else{
            return redirect('/login');
        }
    }
}
