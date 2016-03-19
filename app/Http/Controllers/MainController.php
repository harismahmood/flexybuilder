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

            return view('builder');
        }
        else{
            return redirect('/login');
        }
    }

    public function builder(){
        if (Auth::check()) {
            if (!isset($_GET['nw']) || !isset($_GET['pi']) || !isset($_GET['type'])){
                return redirect('/home');
            }
            $new_project = $_GET['nw'];
            $project_id = $_GET['pi'];
            $type = $_GET['type'];
            $script = "init_type(".$type.",".$new_project.",".$project_id.");";
            $user = Auth::user();
            $user_id = $user -> id;
            Session::flash('user_id',$user_id);
            Session::flash('script',$script);
            return redirect('builder');
        }
        else{
            return redirect('/login');
        }
    }

    public function builderPage(){
        if (Auth::check()){
            return view('builder');
        }
        else{
            return redirect('/login');
        }
    }
}
