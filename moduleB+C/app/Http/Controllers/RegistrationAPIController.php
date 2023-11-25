<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendees;
class RegistrationAPIController extends Controller
{
    public function registration(){
        $attendees = Attendees::all();
    }
}
