<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Hashing\Hash;
use App\Models\Attendees;
use Illuminate\Support\Facades\Auth;
class UserLoginController extends Controller
{
    public function login(Request $request){
        $request->validate([
            "lastname" => "required",
            "registration_code" => "required"
        ]);
        $check = Attendees::all()->where("lastname", $request->lastname)
                          ->where("registration_code", $request->registration_code); 
        if($check->first()){
            $res = [
                "firstname" => $check->first()->firstname,
                "lastname" => $check->first()->lastname,
                "username" => $check->first()->username,
                "email" => $check->first()->email,
                "token" => md5($check->first()->username)
            ];
            return response()->json($res, 200);
        }
        return response()->json(["message" => "Error"], 401);
    }

    public function logout(){
        if (Auth::check()) {
            $user = Auth::user();
            return response()->json([
                'token' => $user->getRememberToken()
            ]);
        } else {
            return response()->json(['message' => 'Người dùng chưa đăng nhập'], 401);
        }
    }
}
