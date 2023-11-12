<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Organizers;
use App\Models\Events;
use App\Models\Channels;
use App\Models\Rooms;
use App\Models\Sessions;
use App\Models\EventTickets;
use App\Models\Registrations;
use App\Models\SessionRegistrations;
class EventDetailAPIController extends Controller
{

    public function show($slug1, $slug2){
        $organizer = Organizers::where("slug", $slug1)->first();
        
        if (!$organizer) {
            return response()->json(["message" => "Không tìm thấy nhà tổ chức"], 404);
        }
        
        $event = Events::where("organizer_id", $organizer->id)
                        ->where("slug", $slug2)
                        ->first();
        
        if (!$event) {
            return response()->json(["message" => "Không tìm thấy sự kiện"], 404);
        }
        
        $ticket = EventTickets::where("event_id", $event->id)->get();
        $channel = Channels::where("event_id", $event->id)->get();
        $room = Rooms::whereIn("channel_id", $channel->pluck("id"))->get();
        $session = Sessions::whereIn("room_id", $room->pluck("id"))->get();
        
        $res = [
            "id" => $event->id,
            "name" => $event->name,
            "slug" => $event->slug,
            "date" => $event->date,
            "channels" => $channel->map(function ($channel) use ($room, $session) {
                return [
                    "id" => $channel->id,
                    "name" => $channel->name,
                    "rooms" => $room->where("channel_id", $channel->id)->map(function ($room) use ($session) {
                        return [
                            "id" => $room->id,
                            "name" => $room->name,
                            "sessions" => $session->where("room_id", $room->id)->map(function ($session) {
                                return [
                                    "id" => $session->id,
                                    "title" => $session->title,
                                    "description" => $session->description,
                                    "speaker" => $session->speaker,
                                    "start" => $session->start,
                                    "end" => $session->end,
                                    "type" => $session->type,
                                    "cost" => $session->cost ?? null
                                ];
                            })
                        ];
                    })
                ];
            }),
            "tickets" => $ticket->map(function ($ticket) {
                return [
                    "id" => $ticket->id,
                    "name" => $ticket->name,
                    "description" => $ticket->description ?? null,
                    "cost" => $ticket->cost,
                    "available" => $ticket->available
                ];
            })
        ];
        
        return response()->json($res, 200);
    }

    public function registration(Request $request){
        if(!Auth::check()){
            return response()->json(['message' => 'Người dùng chưa đăng nhập'], 401);
        }

        $user = Auth::user();
        $registration = Registrations::where('attendee_id', $user->id)->first();
        if ($registration) {
            return response()->json(['message' => 'Người dùng đã đăng ký'], 401);
        }

        $ticket = EventTickets::find($request->ticket_id);
        if(!$ticket){
            return response()->json(['message' => 'Vé không sẵn có'], 401);
        }

        $newRegistration = new Registrations();
        $newRegistration->attendee_id = $user->id;
        $newRegistration->ticket_id = $request->ticket_id;
        $newRegistration->save();

        return response()->json(['message' => 'Đăng ký thành công']);
    }
    
}
