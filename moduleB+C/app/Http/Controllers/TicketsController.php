<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventTickets;    

class TicketsController extends Controller
{
    public function create(){
        return view("tickets.create");
    }
}
