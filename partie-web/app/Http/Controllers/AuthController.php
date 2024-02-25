<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login( Request $request )
    {

        $request->validate([
            "email"=>"required"
        ]);
        if(Auth::attempt(["email"=>$request->input("email"),"password"=>$request->input("password")])){
            $request->session()->regenerate();
            if( Auth::user()->role == "professeur" ){
                return to_route("indexProf")->with("success","Login successfully!");
            }elseif ( Auth::user()->role == "admin"  ){
                return to_route("admin.index")->with("success","Login successfully!");
            }
        }
        return back()->with("danger", "invalid credentials");


    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route("showLogin")->with("success","Logout successfully!");
    }
}
