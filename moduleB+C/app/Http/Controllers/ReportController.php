<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sessions;
use App\Models\Rooms;

class ReportController extends Controller
{
    
    public function index(){
        $sessions = Sessions::all();
        $capacity = Rooms::all();
        return view('reports.index', compact(['sessions', 'capacity']));
    }
}
