<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\Channels;
use App\Models\Rooms;
use Illuminate\Console\Scheduling\Event;

class RoomsController extends Controller
{
    public function create($id){
        $event = Events::find($id);
        $channels = Channels::where('event_id', $id)->get();
        return view("rooms.create", compact('event', 'channels'));
    }
    public function store(Request $request, $id){
        $validatedData = $request->validate([
            'name'=> 'required|string',
            'capacity' => 'required'
        ]);

        $room = new Rooms;
        $room->name = $validatedData['name'];
        $room->channel_id = $request->channel;
        $room->capacity = $validatedData['capacity'];
        $room->save();
        return redirect()->route('events.show', $id)->with('success', 'Lưu phòng mới thành công');
    }
}
