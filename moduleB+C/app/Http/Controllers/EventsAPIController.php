<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;


class EventsAPIController extends Controller
{
    public function index(){
        $events = Events::all();
        return response()->json($events);
    }

    public function show($id){
        $event = Events::find($id);
        return response()->json($event, 200);
    }
    
    // public function store(Request $request){
    //     $event = Events::create($request->all());
    //     return response()->json($event,201);
    // }

    // public function update(Request $request, $id){
    //     $event = Events::find($id);
    //     $event->update($request->all());
    //     return response()->json($event);
    // }

    // public function destroy($id){
    //     Events::destroy($id);
    //     return response()->json("Delete successful");
    // }
}
