<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create(Request $request){
        $this->validate($request, [
            "title"=> "string",
            "description" => "string",
            "speaker" => "string",
        ]);
        return view("sessions.create");
    }
    public function edit(){
        return view("sessions.edit");
    }
}
