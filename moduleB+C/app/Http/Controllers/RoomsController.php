<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function create(){
        return view("rooms.create");
    }
    
    public function index(){
        return view('reports.index');
    }
}
