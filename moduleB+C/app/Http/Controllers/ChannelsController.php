<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\Channels;
class ChannelsController extends Controller
{
    public function create($id){
        $event = Events::find($id);
        return view("channels.create", compact("event"));
    }

    public function store(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|string'
        ]);
        $channel = new Channels;
        $channel->event_id = $id;
        $channel->name = $validatedData['name'];
        $channel->save();
        return redirect()->route('events.show', ['id' => $id])->with('success', 'Lưu kênh thành công');
    }
}
