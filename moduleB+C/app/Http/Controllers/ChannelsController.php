<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChannelsController extends Controller
{
    public function create(){
        return view("channels.create");
    }
}
