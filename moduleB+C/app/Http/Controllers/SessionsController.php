<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\Channels;
use App\Models\Rooms;
use App\Models\Sessions;

class SessionsController extends Controller
{
    public function create($id){
        
        $event = Events::find($id);
        $channels = Channels::where("event_id", $event->id)->get();
        $rooms = Rooms::whereIn("channel_id", $channels->pluck("id"))->get();
        return view("sessions.create", compact('event', 'rooms'));
    }

    public function store(Request $request, $id){
        $this->validate($request, [
            "title"=> "required|string",
            "description" => "required|string",
            "speaker" => "required|string",
            "start"=> "required",
            "end"=> "required"
        ]);

        $session = new Sessions;
        $session->room_id = $request->room;
        $session->title = $request->title;
        $session->speaker = $request->speaker;
        $session->description = $request->description;
        $session->start = $request->start;
        $session->end = $request->end;
        $session->save();

        return redirect()->route('events.show', ['id' => $id])->with("success","Tạo mới phiên thành công");
    }
    public function edit($id, $session_id){
        $event = Events::find($id);
        $channels = Channels::where("event_id", $event->id)->get();
        $rooms = Rooms::whereIn("channel_id", $channels->pluck("id"))->get();
        $session = Sessions::find($session_id);
        return view("sessions.edit", compact('event', 'rooms', 'session'));
    }

    public function update(Request $request, $id, $session_id){
        $this->validate($request, [
            "title"=> "required|string",
            "description" => "required|string",
            "speaker" => "required|string",
            "start"=> "required",
            "end"=> "required"
        ]);

        $session = Sessions::findOrFail( $session_id );
        $session->room_id = $request->room;
        $session->title = $request->title;
        $session->speaker = $request->speaker;
        $session->description = $request->description;
        $session->start = $request->start;
        $session->end = $request->end;
        $session->save();

        return redirect()->route('events.show', ['id' => $id])->with('success','Cập nhật phiên thành công');
    }

}
