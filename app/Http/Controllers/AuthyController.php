<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Validator;
use Auth;
class AuthyController extends Controller
{

    public function login(Request $input){
        $data = array(
            "email" => $input->input('email'),
            "password" => $input -> input ('password')
        );

        $rules = array(
            "email" => "required|email",
            "password" => "required|min:3"
        );

        $validator = Validator::make($data,$rules);

        if ($validator -> fails()){
            Session::flash('error',"Oops! Make sure you have filled in all fields correctly.");
            return redirect('login');
        }else{
            if (Auth::attempt($data)){
                return redirect('/home');
            }
            else{
                Session::flash('error',"Oops! Invalid Email/Password");
                return redirect('login');
            }
        }

    }

    public function logout(){
            Auth::logout();
            return redirect('/login');
    }

    public function loginPage(){
        if (!Auth::check()){
            return view('login');
        }
        else{
            return redirect('/home');
        }
    }

    public function forgotPage(){
        if (!Auth::check()){
            return view('forgot');
        }
        else{
            return redirect('/home');
        }
    }
}
