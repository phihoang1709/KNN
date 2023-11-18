<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sessions;
use App\Models\Rooms;
use App\Models\Channels;
use App\Models\Events;
use App\Models\SessionRegistrations;
class ReportController extends Controller
{
    
    public function index($id){
        $events = Events::find($id);
        $channels = Channels::where("event_id", $events->id)->get();
        $rooms = Rooms::whereIn("channel_id", $channels->pluck("id"))->get();
        $sessions = Sessions::all();
        $registrations = SessionRegistrations::all();
        return view('reports.index', compact('events','rooms', 'registrations', 'sessions'));
    }
}
