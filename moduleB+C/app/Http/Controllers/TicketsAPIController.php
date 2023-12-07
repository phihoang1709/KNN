<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use App\Models\EventTickets;
use App\Models\Sessions;
use App\Models\Events;
use App\Models\Rooms;
use App\Models\Channels;
use App\Models\Registrations;
use App\Models\SessionRegistrations;
use Illuminate\Contracts\Session\Session;

class TicketsAPIController extends Controller
{
    function show($id){
        $tickets = EventTickets::where("event_id", $id)->get();
        return response()->json($tickets, 200);
    }

    function getWorkshops($id){ 
        $events = Events::find( $id );
        $channels = Channels::where("event_id", $events->id)->get();
        $rooms = Rooms::whereIn("channel_id", $channels->pluck("id"))->get();
        $sessions = Sessions::whereIn("room_id", $rooms->pluck("id"))->get();

        return response()->json($sessions,200);
    }    
    
    function buyTicket(Request $request){
        $registrations = new Registrations();
        $registrations->attendee_id = $request->attendee_id;
        $registrations->ticket_id = $request->ticket_id;
        $registrations->registration_time = new DateTime();
        $registrations->save();
        
        return response()->json($registrations, 200);
    }

    function buyOtherTicket(Request $request){
        $registrations = new SessionRegistrations();
        $registrations->registration_id = $request->registration_id;
        $registrations->session_id = $request->session_id;
        $registrations->save();
        
        return response()->json($registrations, 200);
    }
}
