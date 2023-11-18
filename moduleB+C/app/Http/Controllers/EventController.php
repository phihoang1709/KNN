<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\Channels;
use App\Models\Rooms;
use App\Models\Sessions;
use App\Models\EventTickets;
use App\Models\Registrations;
class EventController extends Controller
{
    public function getSum(){

    }
    public function index()
    {
        $events = Events::where('organizer_id', session()->get('user')->id)->get();
        $eventTicket = EventTickets::whereIn('event_id', $events->pluck('id'))->get();
        $registrations = Registrations::whereIn('ticket_id', $eventTicket->pluck('id'))->get();
        return view("events.index", compact("events", "registrations", "eventTicket"));
    }

    public function create(){
        return view("events.create");
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:events',
            'date' => 'required|date',
        ], [
            'slug.unique' => 'Slug đã tồn tại'
        ]);
    
        $event = new Events;
        $event->name = $validatedData['name'];
        $event->slug = $validatedData['slug'];
        $event->date = $validatedData['date'];
        $event->organizer_id = session()->get('user')->id; 
        $event->save();
    
        return redirect()->route('events.create')->with('success', 'Sự kiện đã được lưu thành công.');
    }
    

    public function edit($id){
        $events = Events::find($id);
        return view("events.edit", compact("events"));
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
            'date' => 'required|date',
        ]);

        $event = Events::findOrFail($id);
        $event->name = $validatedData['name'];
        $event->slug = $validatedData['slug'];
        $event->date = $validatedData['date'];
        $event->organizer_id = session()->get('user')->id; 
        $event->save();
    
        return redirect()->route('events.edit',['id' => $event->id])->with('success', 'Sự kiện đã được cập nhật thành công.');
    }

    public function show($id){
        $events = Events::find($id);
        $tickets = EventTickets::where("event_id", $events->id)->get();
        $channels = Channels::where("event_id", $events->id)->get();
        $rooms = Rooms::whereIn("channel_id", $channels->pluck("id"))->get();
        $sessions = Sessions::whereIn("room_id", $rooms->pluck("id"))->get();


        $sumSessions = $sessions->count();
        return view("events.detail", compact(['events', 'channels', 'rooms', 'sessions', 'tickets']));
    }
}
