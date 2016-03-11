<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Auth;
use \App\User;
class AjaxController extends Controller
{
    public function colorUpd(Request $request){
        $id = $request -> input('id');
        $color = $request -> input('color');
        $user = User::where('id',$id)->first();
        $user -> color = $color;
        $user -> save();
    }

    public function colorGet(Request $request){
        $id = $request -> input('id');
        $user = User::where('id',$id)->first();
        return $user->color;
    }
}
