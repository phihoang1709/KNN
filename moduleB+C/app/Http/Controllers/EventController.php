<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\Channels;
use App\Models\Rooms;
use App\Models\Sessions;
use App\Models\EventTickets;

class EventController extends Controller
{
    public function index()
    {
        $events = Events::where('organizer_id', 1)->get();
        return view("events.index", compact("events"));
    }

    public function create(){
        return view("events.create");
    }

 

    public function show($id){
        $events = Events::find($id);
        $tickets = EventTickets::where("event_id", $events->id)->get();
        $channels = Channels::where("event_id", $events->id)->get();
        $rooms = Rooms::whereIn("channel_id", $channels->pluck("id"))->get();
        $sessions = Sessions::whereIn("room_id", $rooms->pluck("id"))->get();
        return view("events.detail", compact(['events', 'channels', 'rooms', 'sessions', 'tickets']));
    }
}
