<?php

namespace App\Http\Controllers;

use App\Http\Resources\EtudiantResource;
use App\Models\User;
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
            if( Auth::user()->role == "professeur" ){
                $request->session()->regenerate();
                return to_route("indexProf")->with("success","Login successfully!");
            }elseif ( Auth::user()->role == "admin"  ){
                $request->session()->regenerate();
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

    public function loginEtd(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if( Auth::user()->role == "etudiant" ) {
                $user = User::where('email', $request->email)->first();
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()->json(['token' => $token,'user'=> new EtudiantResource(Auth::user()->etudiant) ], 200);
            }
        }
        return response()->json(['message' => 'Unauthorized'], 401);

    }

    public function logoutEtd(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out'], 200);
    }

    public function createToken(Request $request)
    {
        $token = $request->user()->createToken('auth_token')->plainTextToken;

        return response()->json(['token' => $token], 200);
    }

}
