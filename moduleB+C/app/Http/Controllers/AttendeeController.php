<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendees;
class AttendeeController extends Controller
{
    public function index(){
        $attendees = Attendees::all();
        return response()->json($attendees);
    }

    public function show($id){
        $attendee = Attendees::findOrFail($id);
        return response()->json($attendee);
    }
}
